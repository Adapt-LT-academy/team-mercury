<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\ Entity
 * @ORM\ Table(name="orders")
 */


class Order
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     *
     */
    protected $id;


    /**
     * One room has many orders. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Apartament", mappedBy="order")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $apartament;

    /**
     * Customer can have many orders
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;
    /**
     * One orderdRoom has many orders. This is the inverse side.
     * @ORM\OneToMany(targetEntity="OrderedRoom", mappedBy="order")
     */
    private $orderedRooms;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Order
     */
    public function setId(int $id): Order
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApartament()
    {
        return $this->apartament;
    }

    /**
     * @param mixed $apartament
     * @return Order
     */
    public function setApartament($apartament)
    {
        $this->apartament = $apartament;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     * @return Order
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderedRooms()
    {
        return $this->orderedRooms;
    }

    /**
     * @param mixed $orderedRooms
     * @return Order
     */
    public function setOrderedRooms($orderedRooms)
    {
        $this->orderedRooms = $orderedRooms;
        return $this;
    }

    public function __construct() {
        $this->apartament = new ArrayCollection();
    }
}