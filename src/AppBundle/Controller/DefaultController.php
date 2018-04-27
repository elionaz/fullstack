<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\UserInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class DefaultController extends Controller 
{

    private $customerService;
    
    /**
     * Get Service container   
     */
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        
        $this->customerService = $container->get("app.customerservice");
    }

    /**
     * @Route("/customer/list", name="customer_list")
     */
    public function customerAction()
    {
        $oCustomer = $this->customerService->getAllitem();
        return $this->render('customer/list.html.twig', array('customers' => $oCustomer));
    }

    /**
     * @Route("/",name="customer_new")
     */
    public function newAction(Request $request)
    {
        $customer = new UserInfo();
        $form = $this->createForm('AppBundle\Form\UserInfoType', $customer);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) 
        {
            $oCustomer = $form->getData();
            $aResult = $this->get('service.curprfc')->processRequestCurpRfc($oCustomer);
            $oCustomer->setRfc($aResult[0]['RFC']);
            $oCustomer->setCurp($aResult[1]['CURP']);
            $oCustomer->setCreatedAt(new \DateTime());
            $this->customerService->saveEntity($oCustomer);
            $this->addFlash('warning', 'Nuevo cliente creado');
            return $this->redirectToRoute('customer_new');
        }
        return $this->render('customer/new.html.twig', array('customer' => $customer, 'form' => $form->createView()));
    }

    /**
     * @Route("/admin/download/csv",name="admin_download_csv")
     * @Method({"GET"})
     * @Security("has_role('ROLE_USER')")
     */
    public function generateCsvAction() 
    {
        $oCustomers = $this->customerService->getAllitem();
        $csvResponse = $this->get('service.csv')->generateCsv($oCustomers);
        return $csvResponse;

    }    
    
    
    /**
     * @Route("/logout", name="logout")
     */
     public function logoutAction()
     {
        $this->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();
        return $this->redirectToRoute('customer_new');        
    }

}
