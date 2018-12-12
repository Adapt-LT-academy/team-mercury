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
                'name' => 'Amberton',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-Vilnius'),
            ],
            [
                'name' => 'Panorama',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-Vilnius'),
            ],
            [
                'name' => 'Ecotel',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Vilnius'),
            ],
            [
                'name' => 'Baltazaras',
                'type' => 'hostel',
                'city_id' => $this->getReference('city-Vilnius'),
            ],
            [
                'name' => 'CitizenM Tower of London',
                'type' => 'motel',
                'city_id' => $this->getReference('city-London'),
            ],
            [
                'name' => 'The Premier Notting Hill',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-London'),
            ],
            [
                'name' => 'Grata by Centrum Hostel',
                'type' => 'hosstel',
                'city_id' => $this->getReference('city-London'),
            ],
            [
                'name' => 'Royal Eagle Hotel',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Berlin'),
            ],
            [
                'name' => 'Blakemore Hyde Park',
                'type' => 'hostel',
                'city_id' => $this->getReference('city-Berlin'),
            ],
            [
                'name' => 'Qbic Motel',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Berlin'),
            ],
            [
                'name' => 'Best Western Victoria Palace',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Berlin'),
            ],
            [
                'name' => 'Dorsett City',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Kaunas'),
            ],
            [
                'name' => 'Victoria',
                'type' => 'hostel',
                'city_id' => $this->getReference('city-Kaunas'),
            ],
            [
                'name' => 'Studio',
                'type' => 'motel',
                'city_id' => $this->getReference('city-Kaunas'),
            ],
            [
                'name' => 'Bernardinu B&B House',
                'type' => 'hotel',
                'city_id' => $this->getReference('city-Kaunas'),
            ],

        ];
        foreach ($hosts as $item) {
            $host = new Host();
            $host->setName($item['name']);
            $host->setType($item['type']);
            $host->setCity($item['city_id']);
            $manager->persist($host);
            $this->addReference($host->getName(), $host);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 2; // number in which order to load fixtures
    }
}