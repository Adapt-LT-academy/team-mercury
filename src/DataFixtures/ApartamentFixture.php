<?php
namespace App\DataFixtures;
use App\Entity\Apartament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ApartamentFixture extends Fixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager)
    {
        $apartaments = [
            [
                'number' => '122',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                '$availableTo' => new \DateTime('2019-01-02'),
                'host_id' => $this->getReference('host-name2'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                '$availableTo' => new \DateTime('2019-01-02'),
                'host_id' => $this->getReference('host-name1'),
            ],
            [
                'number' => '122',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                '$availableTo' => new \DateTime('2019-01-02'),
                'host_id' => $this->getReference('host-name2'),
            ],
            [
                'number' => '122',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                '$availableTo' => new \DateTime('2019-01-02'),
                'host_id' => $this->getReference('host-name4'),
            ],
            [
                'number' => '122',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                '$availableTo' => new \DateTime('2019-01-02'),
                'host_id' => $this->getReference('host-name4'),
            ],

        ];
        foreach ($apartaments as $item) {
            $apartament = new Apartament();
            $apartament->setNumber($item['number']);
            $apartament->setNumberOfRooms($item['numberOfRooms']);
            $apartament->setPrice($item['price']);
            $apartament->setAvailableFrom($item['availableFrom']);
            $apartament->setAvailableTo($item['$availableTo']);
            $apartament->setHost($item['host_id']);

            $manager->persist($apartament);
        }

        $manager->flush();

    }
    public function getOrder()
    {
        return 3; // number in which order to load fixtures
    }
}