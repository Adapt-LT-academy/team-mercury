<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\ Entity
 */

class Host
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
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $type = '';
    /**
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;
    // ...
    /**
     * One host has many rooms. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Apartament", mappedBy="host")
     */
    private $apartament;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Host
     */
    public function setId(int $id): Host
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
     * @return Host
     */
    public function setName(string $name): Host
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Host
     */
    public function setType(string $type): Host
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Host
     */
    public function setCity(City $city)
    {
        $this->city = $city;
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
     * @return Host
     */
    public function setApartament($apartament)
    {
        $this->apartament = $apartament;
        return $this;
    }
    // ...

    public function __construct() {
        $this->apartament = new ArrayCollection();
    }
}