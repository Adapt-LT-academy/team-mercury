<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.11.29
 * Time: 12.58
 */

namespace App\Service;

use App\Entity\Apartament;
use App\Entity\Host;
use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;

class OptionsService
{
    protected $em;

    /**
     * OptionsService constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param String $type
     * @param String $city
     * @return Host[]|array
     */
    public function getHosts(string $type, string $city)
    {
        //$host = new Host();
        return $this->em->getRepository(Host::class)->findHostsByCityAndType($city, $type);
    }

    /**
     * @param String $hostName
     * @param \DateTime $orderedFrom
     * @param \DateTime $orderedTo
     * @return Apartament[]|array
     */
    public function getApartments(string $hostName)
    {
        return $this->em->getRepository(Apartament::class)->findApartamentsByHotelNameAndDataTime($hostName);
    }

    public function isCityAvailable(string $city)
    {
        $isCity = $this->em->getRepository(City::class)->findBy(array('name' => $city ));
        return count($isCity) > 0;

    }

    public function getApartment($id)
    {
        return $this->em->getRepository(Apartament::class)->find($id);
    }
}