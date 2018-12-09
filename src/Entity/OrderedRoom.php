<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\ Entity
 */


class OrderedRoom
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
     * OrderRoom can have many orders
     * @ORM\ManyToOne(targetEntity="Order",cascade={"persist"})
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $order;
    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=11)
     */
    protected $price = 0;
    /**
     * @ORM\OneToOne(targetEntity="Apartament", cascade={"persist"})
     * @ORM\JoinColumn(name="apartament_id", referencedColumnName="id")
     */
    protected $apartament;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $orderedFrom;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $orderedTo;
    /**
     * @return int
     */


    public function __construct() {
        $this->order = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return OrderedRoom
     */
    public function setId(int $id): OrderedRoom
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     * @return OrderedRoom
     */

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return OrderedRoom
     */
    public function setPrice(int $price): OrderedRoom
    {
        $this->price = $price;
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
     * @return OrderedRoom
     */
    public function setApartament($apartament)
    {
        $this->apartament = $apartament;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderedFrom()
    {
        return $this->orderedFrom;
    }

    /**
     * @param mixed $orderedFrom
     * @return OrderedRoom
     */
    public function setOrderedFrom($orderedFrom)
    {
        $this->orderedFrom = $orderedFrom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderedTo()
    {
        return $this->orderedTo;
    }

    /**
     * @param mixed $orderedTo
     * @return OrderedRoom
     */
    public function setOrderedTo($orderedTo)
    {
        $this->orderedTo = $orderedTo;
        return $this;
    }



}