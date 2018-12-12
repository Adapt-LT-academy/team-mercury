<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.12.7
 * Time: 19.10
 */

namespace App\Tests\unit;
use App\Entity\City;
use App\Entity\Host;
use App\Service\OptionsService;
use App\Service\RoomOrderConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\ArrayCache;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Drivers\Tests\FakeDriver;
use BotMan\BotMan\Drivers\Tests\ProxyDriver;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Mockery;
use Mockery\Exception;
use PHPUnit\Framework\TestCase;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;


/**
 *
 */
class RoomOrderConversationTest extends TestCase
{


//    public function testRun()
//    {
//


//        $mock = $this->getMockBuilder(RoomOrderConversation:: class)
//            ->setMethods(array('askCity'))
//            ->getMock();
//        $mock ->expects($this->once())
//            ->method('askCity');
//        $subject = new RoomOrderConversation();
//        $subject ->run($mock);
//   }
     /** @test */
    public function testAskCityWhenAnswerTrue()
    {
        $city = new City();

        $city ->setId(1)
            ->setName('Kaunas');

        //$cityRepository = Mockery::mock(ObjectRepository::class);
        //$cityRepository = $cityRepository->expects(get)

        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askCity')
            ->with('city')
            ->willReturn(self::isTrue());
        /** @noinspection PhpDeprecationInspection */
      //  $this->assertInternalType('bool', $stub->isCityAvailable('Kaunas'));
       $this->assertTrue($stub->isCityAvailable('Kaunas'));
    }
    /** @test */
    public function testAskCityWhenAnswerFalse()
    {
        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askCity')
            ->with('city')
            ->will($this->returnValue(self::isFalse()));
        $this->assertFalse($stub->isCityAvailable('Jonava'));
    }
    /** @test */
    public function testAskType()
    {
        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askType')
            ->with('question')
            ->will($this->returnValue(self::isNull()));

        $question1 = Question::create('In which type of host do you want to stay?');
        $question1->addButtons([
            Button::create('🌭HOTEL')->value('hotel'),
            Button::create('MOTEL🍔')->value('motel'),
            Button::create('HOSTEL🍟')->value('hostel'),
        ]);
//       $this->assertCount(3,  count($question1));
        $this->assertEquals($question1, $stub);
    }
    /** @test */
    public function testAskHost()
    {
        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askHost')
            ->with('answer')
            ->will($this->returnValue('string'));

        $this->assertNotEmpty(  $stub->getHosts('motel', 'Kaunas'));
    }
    /** @test */
    public function testAskFromDate()
    {
        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askFromDate')
            ->will($this->returnValue('2011-01-05'));
        $this->assertSame('2011-01-05', $stub);

    }/** @test */
    public function testAskFromDateWithExeption()
    {
        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askFromDate')
            ->will($this->throwException(new Exception));
        $stub->askFromDate();
    }
//    /** @test */
//    public function testAskToDate()
//    {
//          //yra atsakymas
//          //perreina į kitą klausimą
//    }

//    public function testFindApartmentsWhenTrue()
//    {
//          //jei įmanoma
//          // randa kambarius
//          //perreina į kitą klausimą
//    }
//
//    public function testAskApartmentsWhenFalse()
//    {
//          //jei įmanoma
//          // neranda kambariu
//          //perreina į kitą klausimą
//    }
//
//    public function testAskCustomerData()
//    {
////          //yra atsakymas
////          //perreina į kitą klausimą
//    }
//
//    public function testStopCpnversation()
//    {
//
//    }



}