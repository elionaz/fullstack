<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\UserInfo;
use AppBundle\CurpRfc\CurpRfc;

class DefaultController extends Controller
{

    private $customerService;

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->customerService = $container->get("app.customerservice");
    }

    /**
     * @Route("customer", name="customer_list")
     * @Method({"GET"})
     */
    public function customerAction()
    {
        $customers = $this->customerService->getAllitem();
        return $this->render('customer/list.html.twig', array('customers' => $customers));
    }

    /**
     * @Route("/customer/new",name="customer_new")
     */
    public function newAction(Request $request)
    {
        $customer = new UserInfo();
        $form = $this->createForm('AppBundle\Form\UserInfoType', $customer);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) 
        {
            $data = $form->getData();
            $data->setCreatedAt(new \DateTime());
            $oCurpRfc = new CurpRfc();    
            $data->setRfc($oCurpRfc->getRfcValue($data));        
            $data->setCurp($oCurpRfc->getCurpValue($data));           
            $this->customerService->saveEntity($data);
            $this->addFlash('warning', 'Nuevo cliente creado');
            return $this->redirectToRoute('customer_new');
        }
        return $this->render('customer/new.html.twig', array('customer' => $customer, 'form' => $form->createView()));
    }

}
