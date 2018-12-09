<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\ Entity(repositoryClass = "App\Repository\ApartamentRepository")
 */


class Apartament
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
     * Apartament number
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $number;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=11)
     */
    protected $numberOfRooms = 0;
    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=11)
     */
    protected $price = 0;
    /**
     * @ORM\Column(type="datetime")
     */
    private $availableFrom;
    /**
     * @ORM\Column(type="datetime")
     */
    private $availableTo;
    /**
     * Host can have many apartaments
     * @ORM\ManyToOne(targetEntity="Host")
     * @ORM\JoinColumn(name="host_id", referencedColumnName="id")
     */
    private $host;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Apartament
     */
    public function setId(int $id): Apartament
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Apartament
     */
    public function setNumber(string $number): Apartament
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfRooms(): int
    {
        return $this->numberOfRooms;
    }

    /**
     * @param int $numberOfRooms
     * @return Apartament
     */
    public function setNumberOfRooms(int $numberOfRooms): Apartament
    {
        $this->numberOfRooms = $numberOfRooms;
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
     * @return Apartament
     */
    public function setPrice(int $price): Apartament
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * @param mixed $availableFrom
     * @return Apartament
     */
    public function setAvailableFrom($availableFrom)
    {
        $this->availableFrom = $availableFrom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableTo()
    {
        return $this->availableTo;
    }

    /**
     * @param mixed $availableTo
     * @return Apartament
     */
    public function setAvailableTo($availableTo)
    {
        $this->availableTo = $availableTo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     * @return Apartament
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }


}