<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class CustomerServiceFactory
{

    /** @var EntityManager */
    private $entityManager;

    /** @var Request  */
    private $request;

    /**
     * ChoiceService constructor.
     * @param $entityManager EntityManager
     * @param $formFactory FormFactory
     * @param $requestStack RequestStack
     */
    public function __construct($entityManager, $formFactory, $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return IUserService
     */
    public function getService()
    {
        return new CustomerService($this->entityManager, $this->formFactory, $this->request);
    }

}
