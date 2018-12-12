<?php
///**
// * Created by PhpStorm.
// * User: indre
// * Date: 18.12.6
// * Time: 12.46
// */
//
//namespace App\Tests\unit;
//
//use App\Entity\Apartament;
//use App\Entity\City;
//use App\Entity\Host;
//use App\Service\OptionsService;
//use Doctrine\Common\Persistence\ObjectRepository;
//use Doctrine\ORM\EntityManagerInterface;
//use Mockery;
//use PHPUnit\Framework\TestCase;
//
//class optionsServiceTest extends TestCase
//{
//
//    /** @test */
//    public function testGetHost()
//    {
//        $host = new Host();
//        $host
//            ->setApartament('apartment1')
//            ->setId(1)
//            ->setName('host1')
//            ->setType('hotel');
//        $hostRepository = Mockery::mock(ObjectRepository::class);
////        $hostRepository = $hostRepository->expects('findHostsByCityAndType')->withArgs('Vilnius', 'hotel')->atLeast()->once()->andReturn([$host])->getMock();
//        $hostRepository = $hostRepository->expects('findHostsByCityAndType')->atLeast()->once()->andReturn([$host])->getMock();
//        $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = $objectManager->expects('getRepository')
//            ->atLeast()
//            ->once()
//            ->andReturn($hostRepository)
//            ->getMock();
//        /** @noinspection PhpParamsInspection */
//        $optionsService = new OptionsService($objectManager);
//        /** @noinspection PhpDeprecationInspection */
//        self::assertInternalType('array', $optionsService->getHosts('hotel', 'city'));
//    }
//    /** @test */
//    public function testGetApartments()
//    {
//        $apartment = new Apartament();
//        $apartment
//            ->setId(1)
//            ->setPrice(20)
//            ->setAvailableFrom(new \DateTime('2011-01-01'))
//            ->setAvailableTo(new \DateTime('2019-01-02'))
//            ->setHost(2)
//            ->setNumber(3)
//            ->setNumberOfRooms(2);
//        $apartmentRepository = Mockery::mock(ObjectRepository::class);
//        $apartmentRepository = $apartmentRepository->expects('findApartamentsByHotelNameAndDataTime')->atLeast()->once()->andReturn([$apartment])->getMock();
////        $apartmetRepository = $apartmentRepository->expects('findApartamentsByHotelNameAndDataTime')->withArgs('Amberton')->atLeast()->once()->andReturn([$apartment])->getMock();
//        $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = $objectManager->expects('getRepository')
//            ->atLeast()
//            ->once()
//            ->andReturn($apartmentRepository)
//            ->getMock();
//        /** @noinspection PhpParamsInspection */
//        $optionsService = new OptionsService($objectManager);
//        $host = new Host();
//        $host
//            ->setApartament('apartment1')
//            ->setId(1)
//            ->setName('host1')
//            ->setType('hotel');
//        /** @noinspection PhpDeprecationInspection */
//        $this::assertInternalType('array', $optionsService->getApartments($host->getName()));
//    }
//    /** @test */
//    public function testIsCityAvailable()
//    {
//        $cityRepository = Mockery::mock(ObjectRepository::class);
//        $cityRepository = $cityRepository->expects('findBy')->atLeast()->once()->getMock();
//        $objectManager = Mockery::mock(EntityManagerInterface::class);
//        $objectManager = $objectManager->expects('getRepository')
//            ->atLeast()
//            ->once()
//            ->andReturn($cityRepository)
//            ->getMock();
//        $cityCount =
//            /** @noinspection PhpParamsInspection */
//        $optionsService = new OptionsService($objectManager);
//       // $this::assertTrue($optionsService->isCityAvailable('city1'));
//        $stub = $this->createMock(OptionsService::class);
//        $stub->method('isCityAvailable')
//            ->willReturn('true');
//        $this->assertSame('true', $stub->isCityAvailable('city1'));
//    }
//
//}