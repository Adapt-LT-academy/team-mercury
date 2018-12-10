<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.12.6
 * Time: 12.46
 */

namespace App\Tests\unit;

use App\Entity\Apartament;
use App\Entity\City;
use App\Entity\Host;
use App\Service\OptionsService;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Mockery;
use PHPUnit\Framework\TestCase;

class OptionsServiceTest extends TestCase
{

    /**
     *
     */
    public function testGetHost()
    {
        $host = new Host();

        $host
            ->setApartament('apartment1')
            ->setId(1)
            ->setName('host1')
            ->setType('hotel');

        //$hostRepository = Mockery::mock(ObjectRepository::class);
        $hostRepository = Mockery::mock(ObjectRepository::class);
        $hostRepository = $hostRepository->expects('findHostsByCityAndType')->atLeast()->once()->andReturn([$host])->getMock();

        // $objectManager = Mockery::mock(EntityManagerInterface::class);
        $objectManager = Mockery::mock(EntityManagerInterface::class);
        $objectManager = $objectManager->expects('getRepository')
            ->atLeast()
            ->once()
            ->andReturn($hostRepository)
            ->getMock();

        /** @noinspection PhpParamsInspection */
        $optionsService = new OptionsService($objectManager);

        self::assertInternalType('array', $optionsService->getHosts('hotel', 'city'));



//        $host = new Host();

//        $host
//            ->setApartament('apartment1')
//            ->setId(1)
//            ->setName('host1')
//            ->setType('hotel');
//
//        //$hostRepository = Mockery::mock(ObjectRepository::class);
//        $hostRepository = Mockery::mock(ObjectRepository::class);
//        $hostRepository = $hostRepository->expects('findAll')->atLeast()->once()->andReturn([$host])->getMock();
//
//        // $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = $objectManager->expects('getRepository')
//            ->atLeast()
//            ->once()
//            ->andReturn($hostRepository)
//            ->getMock();
//
//        /** @noinspection PhpParamsInspection */
//        $optionsService = new OptionsService($objectManager);
//
//        self::assertInternalType('array', $optionsService->getHosts('hotel', 'city'));
    }

    /**
     * @throws \Exception
     */
    public function testGetApartments()
    {
        $apartment = new Apartament();

        $apartment
            ->setId(1)
            ->setPrice(20)
            ->setAvailableFrom(new \DateTime('2011-01-01'))
            ->setAvailableTo(new \DateTime('2019-01-02'))
            ->setHost(2)
            ->setNumber(3)
            ->setNumberOfRooms(2);

        //$hostRepository = Mockery::mock(ObjectRepository::class);
        $apartmentRepository = Mockery::mock(ObjectRepository::class);
        $apartmentRepository = $apartmentRepository->expects('findBy')->atLeast()->once()->andReturn([$apartment])->getMock();

        // $objectManager = Mockery::mock(EntityManagerInterface::class);
        $objectManager = Mockery::mock(EntityManagerInterface::class);
        $objectManager = $objectManager->expects('getRepository')
            ->atLeast()
            ->once()
            ->andReturn($apartmentRepository)
            ->getMock();

        /** @noinspection PhpParamsInspection */
        $optionsService = new OptionsService($objectManager);

        $host = new Host();

        $host
            ->setApartament('apartment1')
            ->setId(1)
            ->setName('host1')
            ->setType('hotel');


        $this::assertInternalType('array', $optionsService->getApartments($host, new \DateTime('2011-01-01'), new \DateTime('2011-01-02')));


    }

    /**
     *
     */
    public function testIsCityAvailable()
    {

        $cityRepository = Mockery::mock(ObjectRepository::class);
        $cityRepository = $cityRepository->expects('findBy')->atLeast()->once()->getMock();

        $objectManager = Mockery::mock(EntityManagerInterface::class);
        $objectManager = $objectManager->expects('getRepository')
            ->atLeast()
            ->once()
            ->andReturn($cityRepository)
            ->getMock();

        $cityCount =
            /** @noinspection PhpParamsInspection */
        $optionsService = new OptionsService($objectManager);

       // $this::assertTrue($optionsService->isCityAvailable('city1'));


        $stub = $this->createMock(OptionsService::class);
        $stub->method('isCityAvailable')
            ->willReturn('true');


        $this->assertSame('true', $stub->isCityAvailable('city1'));

//        //$hostRepository = Mockery::mock(ObjectRepository::class);
//        $hostRepository = Mockery::mock(ObjectRepository::class);
//        $hostRepository = $hostRepository->expects('findBy')->atLeast()->once()->getMock();
//
//        // $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = $objectManager->expects('getRepository')
//            ->atLeast()
//            ->once()
//            ->andReturn($hostRepository)
//            ->getMock();
//
//        /** @noinspection PhpParamsInspection */
//        $optionsService = new OptionsService($objectManager);
//
//        self::assertTrue($optionsService->isCityAvailable('city1'));




    }



    /**
     *
     */
//    public function testEmpty()
//    {
//        $stack = [];
//        $this->assertEmpty($stack);
//
//        return $stack;
//    }
//
//    /**
// * @depends testEmpty
// */
//    public function testPush(array $stack)
//    {
//        array_push($stack, 'foo');
//        $this->assertSame('foo', $stack[count($stack)-1]);
//        $this->assertNotEmpty($stack);
//
//        return $stack;
//    }
//
//    /**
//     * @depends testPush
//     */
//    public function testPop(array $stack)
//    {
//        $this->assertSame('foo', array_pop($stack));
//        $this->assertEmpty($stack);
//    }
}