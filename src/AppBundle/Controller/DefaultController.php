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
        $customers = $this->customerService->getAllitem();
        return $this->render('customer/list.html.twig', array('customers' => $customers));
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
            $data = $form->getData();
            $aResult = $this->get('service.curprfc')->processRequestCurpRfc($data);
            $data->setRfc($aResult[0]['RFC']);
            $data->setCurp($aResult[1]['CURP']);
            $data->setCreatedAt(new \DateTime());
            $this->customerService->saveEntity($data);
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
        $response = $this->get('service.csv')->generateCsv($oCustomers);
        return $response;

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
