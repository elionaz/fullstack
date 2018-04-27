<?php

namespace AppBundle\Service;

interface ICustomerService 
{

    /**
     * @return entities[]
     */
    public function getAllitem();    

    /**
     * @param $product Entity
     */
    public function saveEntity($product);

   
}
