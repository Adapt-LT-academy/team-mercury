<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\ Entity
 */


class Room
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
    protected $number = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=11)
     */
    protected $ammountOfRooms = 0;
    /**
     * Host can have many rooms
     * @ORM\ManyToOne(targetEntity="Host")
     * @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     */
    private $host;

    // ...
    /**
     * One room has many orders. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Order", mappedBy="room")
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
    public function getNumber(): int
    {
        return $this->number;
    }
    /**
     * @param string $name
     *
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }
    /**
     * @return int
     */
    public function getAmmountOfRooms(): int
    {
        return $this->price;
    }
    /**
     * @param int $ammountOfRooms
     *
     * @return $this
     */
    public function setAmmountOfRooms(int $ammountOfRooms): self
    {
        $this->ammountOfRooms = $ammountOfRooms;
        return $this;
    }
    public function __construct() {
        $this->order = new ArrayCollection();
    }

}