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
    // ...
    /**
     * One custumer has many orders. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Order", mappedBy="customer")
     */
    private $order;
    // ...


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
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
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function __construct() {
        $this->order = new ArrayCollection();
    }
}
