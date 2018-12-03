<?php
namespace App\DataFixtures;
use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class CityFixtures extends Fixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager)
    {
        $cities = [
            [
                'name' => 'Vilnius',
            ],
            [
                'name' => 'Ryga',
            ],
            [
                'name' => 'London',
            ],
            [
                'name' => 'Kaunas',
            ],
            [
                'name' => 'Berlin',
            ],

        ];
        foreach ($cities as $item) {

            $city = new City();
            $city->setName($item['name']);

            $manager->persist($city);
            $this->addReference('city-'.$city->getId(), $city);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 1; // number in which order to load fixtures
    }
}