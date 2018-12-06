<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Host;
/**
 * @ORM\ Entity
 */


class Customer
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
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function setId(int $id): Customer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
     */
    public function setName(string $name): Customer
    {
        $this->name = $name;
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
     * @return Customer
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }
    // ...
    /**
     * One custumer has many orders. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer")
     */
    private $order;
    // ...


    public function __construct() {
        $this->order = new ArrayCollection();
    }
}
