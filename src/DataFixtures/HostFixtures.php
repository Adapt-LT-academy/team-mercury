<?php
namespace App\DataFixtures;
use App\Entity\Host;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class HostFixtures extends Fixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager)
    {
        $hosts = [
            [
                'name' => 'name1',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-1'),
            ],
            [
                'name' => 'name2',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-3'),
            ],
            [
                'name' => 'name3',
                'type' => 'motel',
                'city_id' => $this->getReference('city-1'),
            ],
            [
                'name' => 'name4',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-2'),
            ],
            [
                'name' => 'name5',
                'type' => 'motel',
                'city_id' => $this->getReference('city-1'),
            ],

        ];
        foreach ($hosts as $item) {
            $host = new Host();
            $host->setName($item['name']);
            $host->setType($item['type']);
            $host->setCity($item['city_id']);
            $manager->persist($host);
            $this->addReference('host-'.$host->getId(), $host);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 2; // number in which order to load fixtures
    }
}