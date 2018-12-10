<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.12.7
 * Time: 19.10
 */

namespace App\Tests\unit;
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

//    /** @var BotMan */
//    private $botman;
//    /** @var FakeDriver */
//    private $fakeDriver;
//    /** @var Mockery\MockInterface */
//    private $cache;
//
//    public static function setUpBeforeClass()
//    {
//        DriverManager::loadDriver(ProxyDriver::class);
//    }
//
//    public static function tearDownAfterClass()
//    {
//        DriverManager::unloadDriver(ProxyDriver::class);
//    }
//
//    protected function setUp()
//    {
//        $this->fakeDriver = new FakeDriver();
//        $this->cache = Mockery::mock(ArrayCache::class)->makePartial();
//        ProxyDriver::setInstance($this->fakeDriver);
//        $this->botman = BotManFactory::create([], $this->cache);
//    }
//
//    protected function tearDown()
//    {
//        ProxyDriver::setInstance(FakeDriver::createInactive());
//        Mockery::close();
//    }
//
//
//
//    private function replyWithFakeMessage($message, $username = 'helloman', $channel = '#helloworld')
//    {
//        if ($message instanceof IncomingMessage) {
//            $this->fakeDriver->messages = [$message];
//        } else {
//            $this->fakeDriver->messages = [new IncomingMessage($message, $username, $channel)];
//        }
//        $this->botman->listen();
//    }
//
//    /** @test */
//    public function testStartConversation()
//    {
//        $this->botman
//            ->getMessage('Hi')
//            ->assertReplies([
//                'Hello!',
//                'Nice to meet you. What is your name?',
//            ])->receives('BotMan')
//            ->assertReply('BotMan, that is a beautifule name :-)');
//    }
//
//
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
        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askCity')
            ->with('answer')
            ->will($this->returnValue('string'));


        $this->assertSame(null, $stub->isCityAvailable('city1'));
    }

    /** @test */
    public function testAskCityWhenAnswerNull()
    {

        $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askCity')
            ->with('answer')
            ->will($this->returnValue(self::isNull()));


        $this->assertSame(null, $stub->isCityAvailable('city1'));

    }

    /** @test */
    public function testAskType()
    { $stub = $this->createMock(RoomOrderConversation::class);
        $stub->method('askType')
            ->willReturn('question');

        $question1 = Question::create('In which type of host do you want to stay?');
        $question1->addButtons([
            Button::create('🌭HOTEL')->value('hotel'),
            Button::create('MOTEL🍔')->value('motel'),
            Button::create('HOSTEL🍟')->value('hostel'),
        ]);
       $this->assertCount(3, $stub->toArray(),  'actions');
     //   $this->assertSame('HOTEL', $question->toArray(), 'actions.0.text');
      //  $this->assertSame('MOTEL', $question->toArray(), 'actions.1.text');
       // $this->assertSame('bHOSTEL', $question->toArray(), 'actions.2.text');
        $this->assertEquals($question1, $stub);
    }

//    public function testAskHost()
//    {
//          //yra atsakymas
//          //perreina į askFromDate()
//    }
//
//    public function testAskFromDate()
//    {
//          //yra atsakymas
//          //perreina į kitą klausimą
//    }
//
//    public function testAskToDate()
//    {
//          //yra atsakymas
//          //perreina į kitą klausimą
//    }
//
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