<?php
/**
 * Created by PhpStorm.
 * User: saulius
 * Date: 18.12.8
 * Time: 22.28
 */

namespace App\Service;


use App\Entity\Order;
use Doctrine\Common\Persistence\ObjectManager;

class OrderService
{
    protected $om;
    public function __construct(ObjectManager $manager)
    {
        $this->om = $manager;
    }

    public function addOrderData(Order $order){

        $this->om->persist($order);
        $this->om->flush();
    }
}