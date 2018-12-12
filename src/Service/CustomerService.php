<?php
/**
 * Created by PhpStorm.
 * User: saulius
 * Date: 18.12.8
 * Time: 00.07
 */

namespace App\Service;


use App\Entity\Customer;
use Doctrine\Common\Persistence\ObjectManager;

class CustomerService
{
    protected $om;
    public function __construct(ObjectManager $manager)
    {
        $this->om = $manager;
    }

    public function addCustomerData(Customer $customer){
        $this->om->persist($customer);
        $this->om->flush();
    }
}