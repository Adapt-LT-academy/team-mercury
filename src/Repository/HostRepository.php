<?php
/**
 * Created by PhpStorm.
 * User: saulius
 * Date: 18.12.5
 * Time: 17.35
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class HostRepository extends EntityRepository
{
    public function findHostsByCityAndType($cityName, $hostType)
    {
        $qb = $this->createQueryBuilder('h');
        $qb->select('h')
            ->join('h.city','c')
            ->where(' c.name = :city')
            ->andWhere('h.type = :type')
            ->setParameters(
                ['city'=>$cityName, 'type'=>$hostType]

            );
        return $qb->getQuery()->getResult();
    }
}