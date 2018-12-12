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
    private function getNow(){
        return now();
    }
    public function findApartamentsByHotelNameAndDataTime($hostName)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a')
            ->join('a.host','h')
            ->where(' h.name = :host')
            ->andWhere('a.availableTo > CURRENT_TIMESTAMP()')
            ->setParameter('host', $hostName);
        return $qb->getQuery()->getResult();
    }
}