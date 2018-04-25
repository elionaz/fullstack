<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\UserInfo;


class CustomerService extends CrudService implements ICustomerService 
{

    public function __construct(EntityManager $entityManager, FormFactory $formFactory, Request $request)
    {
        parent::__construct($entityManager, $formFactory, $request);
    }

    public function getRepo() 
    {
        return $this->em->getRepository(UserInfo::class);
    }

    /**
     * @return Entity[]
     */
    public function getAllitem() 
    {
        return $this->getRepo()->findAll();
    }


    /**
     * @param $entity
     */
    public function saveEntity($entity)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }


}
