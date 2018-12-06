<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Host;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\ Entity
 */


class City
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
     * One city has many host. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Host", mappedBy="city")
     */
    private $host;
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
        $this->host = new ArrayCollection();
    }
}
