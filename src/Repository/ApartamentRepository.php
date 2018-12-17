<?php
/**
 * Created by PhpStorm.
 * User: saulius
 * Date: 18.12.7
 * Time: 20.54
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;


class ApartamentRepository extends EntityRepository
{
    public function findApartamentsByHotelNameAndDataTime($hostName)
    {
        $qb = $this->createQueryBuilder('apartament');
        $qb->select('apartament')
            ->join('apartament.host','h')
            ->where(' h.name = :host')
            ->andWhere('apartament.availableTo > CURRENT_TIMESTAMP()')
            ->setParameter('host', $hostName);
        return $qb->getQuery()->getResult();
    }
}