<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.11.29
 * Time: 11.37
 */

namespace App\Service;

use App\Entity\Customer;
use App\Entity\Host;
use App\Entity\OrderedRoom;
use App\Traits\ContainerAwareConversationTrait;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use http\Exception\RuntimeException;
use App\Entity\Apartament;
use App\Entity\Order;
use Exception;


class RoomOrderConversation extends Conversation
{
    use ContainerAwareConversationTrait;

    public $city;

    public $type;

    public $host;

    public $apartment;

    public $customer;

    public $price;

    public $orderedFromDate;

    public $orderedToDate;

    public function run()
    {
        $this->askCity();
    }

    public function askCity()
    {
        $this->ask(
        /**
         * @param $answer
         */
            'In which city do you want to stay?',
            function ($answer) {
              //  $this->city = $answer->getText();


                $city = $this->getContainer()->get(OptionsService::class)->isCityAvailable($answer->getText());

                if ($city){
                    $this->city = $answer->getText();

                    $this->askType();
                }else{
                    $this->say('Sorry, in this city are any host. Please try again.');
                    $this->askCity();
                }
            }
        );
    }

    public function askType()
    {
        $question = Question::create('In which type of host do you want to stay?');
        $question->addButtons(
            [
                //jei miestas turi type -> create button
                Button::create('HOTEL')->value('hotel'),
                Button::create('MOTEL')->value('motel'),
                Button::create('HOSTEL')->value('hostel'),
            ]
        );
        $this->ask(
            $question,
            function ($answer) {
                $this->type = $answer->getText();
                $this->askHost();
            }
        );
    }

    public function askHost()
    {
        $hosts = $this->getContainer()->get(OptionsService::class)->getHosts($this->type, $this->city);

        $buttons = [];
        foreach ($hosts as $host)
        {

            $buttons[] = Button::create($host->getName())->value($host->getName());


        }
        $question = Question::create('In which '.$this->type.' do you want to stay?');
        $question->addButtons($buttons);
        $this->ask(
            $question,
            function ($answer) use ($hosts){
                foreach ($hosts as $host){
                    if ($host->getName() == $answer->getText()){
                        $this->host = $host;
                        break;
                    }
                }
                $this->askFromDate();
            }
        );
    }

    public function askFromDate()
    {
        $question = Question::create('When do you want to come?');
        $this->ask(
            $question,
            function ($answer) {
                try{
                    $this->orderedFromDate = new \DateTime($answer->getText());
                    $this->askToDate();
                }
                catch (Exception $e){
                    $this->say('Sorry, data format incorrect. Please try again.');
                    $this->askFromDate();
                }
            }
        );
    }

    public function askToDate()
    {
        $question = Question::create('When do you want to leave?');
        $this->ask(
            $question,
            function ($answer) {
                try{
                    $this->orderedToDate = new \DateTime($answer->getText());
                    $this->findApartments();
                }
                catch (Exception $e){
                    $this->say('Sorry, data format incorrect. Please try again.');
                    $this->askToDate();
                }
            }
        );

    }

    private function findApartments()
    {
        $apartments = $this->getContainer()->get(OptionsService::class)->getApartments($this->host->getName());
        if (count($apartments) > 0)
        {
            $this->askApartment($apartments);
        }else{

            $this->say('Sorry, there are any available rooms at this time. Please try again.');
            $this->askFromDate();
        }
    }

    public function askApartment($apartments)
    {

        $buttons = [];
        foreach ($apartments as $apartment)
        {

            $buttons[] = Button::create($apartment->getNumber())->value($apartment->getNumber());

        }

        $question = Question::create('In which apartment do you want to stay?');
        $question->addButtons(
            $buttons
        );
        $this->ask(
            $question,
            function ($answer) use ($apartments){
                foreach ($apartments as $apartment)
                {
                    if($apartment->getNumber() == $answer->getText()){
                        $this->price = $apartment->getPrice();
                        $this->apartment = $apartment;
                        break;
                    }
                }
                $this->askCustomerData();
            }
        );
    }

    public function askCustomerData()
    {
        $this->ask(

        'What is your name?',
            function ($answer) {

                $this->customer = $answer->getText();

                $this->say('Okay. Your apartament is ordered.');
                $this->say('City: ' . $this->city);
                $this->say($this->type . ' : ' . $this->host);
                $this->say('Date: from ' . $this->orderedFromDate->format('Y-m-d') . ' to ' . $this->orderedToDate->format('Y-m-d'));
                $this->say('Price: ' . $this->price);
                $this->addDataToDatabase();

            }
        );
    }

    public function addDataToDatabase(){
        $customerObject = new Customer();
        $customerObject->setName($this->customer);
        $this->getContainer()->get(CustomerService::class)->addCustomerData($customerObject);

        $orderObject = new Order();
        $orderObject->setCustomer($customerObject);
        $this->getContainer()->get(OrderService::class)->addOrderData($orderObject);

        $apartment = $this->getContainer()->get(OptionsService::class)->getApartment($this->apartment->getId());
        $orderedRoomObject = new OrderedRoom();
        $orderedRoomObject->setApartament($apartment);
        $orderedRoomObject->setPrice($this->price);
        $orderedRoomObject->setOrderedFrom($this->orderedFromDate);
        $orderedRoomObject->setOrderedTo($this->orderedToDate);
        $orderedRoomObject->setOrder($orderObject);
        $this->getContainer()->get(OrderedRoomService::class)->addOrderedRoomData($orderedRoomObject);
    }

    public function stopConversation(IncomingMessage $message)
    {

        return $message->getMessage() === 'stop';

    }
}