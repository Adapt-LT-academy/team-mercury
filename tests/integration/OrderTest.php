<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.12.9
 * Time: 09.55
 */

namespace App\Tests;

use App\Entity\Apartament;
use App\Entity\City;
use App\Entity\Customer;
use App\Entity\Host;
use App\Entity\Order;
use App\Entity\OrderedRoom;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class orderTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }

    public function testOrderTotal()
    {
        /**
         * @var City $nameCity
         */
        $nameCity = $this->entityManager
            ->getRepository(City::class)
            ->findOneBy(['name' => 'Kaunas'])
        ;

        /**
         * @var Host $type
         */
        $type = $this->entityManager
            ->getRepository(Host::class)
            ->findOneBy(['type' => 'motel', 'city'=>$nameCity])
        ;

        /**
         * @var Host $host
         */
        $host = $this->entityManager
            ->getRepository(Host::class)
            ->findOneBy(['type' => 'motel', 'city'=>$nameCity])
        ;

        /**
         * @var Apartament $apartament
         */
        $apartament = $this->entityManager
            ->getRepository(Apartament::class)
            ->findOneBy(['availableFrom' => new \DateTime('2011-01-01'), 'availableTo' => new \DateTime('2011-01-02'), 'host'=>$host])
        ;

        /**
         * @var Customer $customer
         */
        $customer = $this->entityManager
            ->getRepository(Customer::class)
            ->findOneBy(['name' => 'vardas'])
        ;

        $orderRoom = new OrderedRoom();
        $orderRoom->setApartament($apartament);
        $orderRoom->setPrice($apartament->getId());

        $order = new Order();
        $order->setApartament($apartament);
        $order->setCustomer($customer);
        $order->setOrderedRooms($orderRoom);

        $orderRoom->setOrder($order);

        $this->assertEquals(201, $order->getOrderedRooms()->getPrice());
    }

}