<?php
/**
 * Created by PhpStorm.
 * User: saulius
 * Date: 18.12.9
 * Time: 00.28
 */

namespace App\Service;

use App\Entity\OrderedRoom;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class OrderedRoomService
{
    protected $om;
    public function __construct(EntityManagerInterface $manager)
    {
        $this->om = $manager;
    }
    public function addOrderedRoomData(OrderedRoom $orderedRoom){
        $this->om->persist($orderedRoom);
        $this->om->flush();
    }
}