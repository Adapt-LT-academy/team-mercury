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
                'city_id' => $this->getReference('city-Vilnius'),
            ],
            [
                'name' => 'name2',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-London'),
            ],
            [
                'name' => 'name3',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Vilnius'),
            ],
            [
                'name' => 'name4',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-Berlin'),
            ],
            [
                'name' => 'name5',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Kaunas'),
            ],

        ];
        foreach ($hosts as $item) {
            $host = new Host();
            $host->setName($item['name']);
            $host->setType($item['type']);
            $host->setCity($item['city_id']);
            $manager->persist($host);
            $this->addReference('host-'.$host->getName(), $host);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 2; // number in which order to load fixtures
    }
}