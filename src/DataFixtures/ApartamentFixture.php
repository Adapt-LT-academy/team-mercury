<?php
namespace App\DataFixtures;
use App\Entity\Apartament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ApartamentFixture extends Fixture implements OrderedFixtureInterface{

    public function apartamentData(){
        return [
            [
                'number' => '101',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Amberton'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Panorama'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Ecotel'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Baltazaras'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Grata by Centrum Hostel'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('The Premier Notting Hill'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('CitizenM Tower of London'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
                'availableTo' => new \DateTime('2019-01-02'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Royal Eagle Hotel'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Blakemore Hyde Park'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Best Western Victoria Palace'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 100,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Dorsett City'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 100,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 100,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Victoria'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-01'),
                'availableTo' => new \DateTime('2011-01-02'),
                'host_id' => $this->getReference('Studio'),
            ],
            [
                'number' => '101',
                'numberOfRooms' => 3,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Studio'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Studio'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 2,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-03'),
                'availableTo' => new \DateTime('2011-01-04'),
                'host_id' => $this->getReference('Studio'),
            ],
            [
                'number' => '102',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Studio'),
            ],
            [
                'number' => '103',
                'numberOfRooms' => 4,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-02'),
                'availableTo' => new \DateTime('2011-01-03'),
                'host_id' => $this->getReference('Studio'),
            ],
            [
                'number' => '104',
                'numberOfRooms' => 1,
                'price' => 201,
                'availableFrom' => new \DateTime('2011-01-05'),
                'availableTo' => new \DateTime('2011-01-06'),
                'host_id' => $this->getReference('Studio'),
            ],




        ];
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->apartamentData() as $item) {
            $apartament = new Apartament();
            $apartament->setNumber($item['number']);
            $apartament->setNumberOfRooms($item['numberOfRooms']);
            $apartament->setPrice($item['price']);
            $apartament->setAvailableFrom($item['availableFrom']);
            $apartament->setAvailableTo($item['availableTo']);
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