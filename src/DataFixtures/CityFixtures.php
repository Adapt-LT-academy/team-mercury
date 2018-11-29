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
                'id' => '1',
                'name' => 'Vilnius',
            ],
            [
                'id' => '2',
                'name' => 'Ryga',
            ],
            [
                'id' => '3',
                'name' => 'London',
            ],
            [
                'id' => '4',
                'name' => 'Kaunas',
            ],
            [
                'id' => '5',
                'name' => 'Berlin',
            ],

        ];
        foreach ($cities as $item) {

            $city = new City();
            var_dump($city->setId($item['id']));
            $city->setId($item['id']);
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