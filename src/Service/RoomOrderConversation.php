<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.11.29
 * Time: 11.37
 */

namespace App\Service;

use App\Entity\Host;
use App\Entity\OrderedRoom;
use App\Traits\ContainerAwareConversationTrait;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use http\Exception\RuntimeException;

class RoomOrderConversation extends Conversation
{
    use ContainerAwareConversationTrait;

    protected $city;

    protected $type;

    protected $host;

    protected $apartment;

    protected $customer;

    protected $price;

    protected $orderedFromDate;

    protected $orderedToDate;


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
                Button::create('🌭HOTEL')->value('hotel'),
                Button::create('MOTEL🍔')->value('motel'),
                Button::create('HOSTEL🍟')->value('hostel'),
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

    /**
     *
     */
    public function askHost()
    {
        $hosts = $this->getContainer()->get(OptionsService::class)->getHosts($this->type, $this->city);

        $buttons = [];
        foreach ($hosts as $host)
        {
            $buttons[] = Button::create($host->getName())->value($host->getName());

        }
        $buttons[] = Button::create('🌭gasggsa')->value('fsafsa');
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
                $this->orderedFromDate = new \DateTime($answer->getText());
                $this->askToDate();
            }
        );
    }

    public function askToDate()
    {
        $question = Question::create('When do you want to leave?');
        $this->ask(
            $question,
            function ($answer) {
                $this->orderedToDate = new \DateTime($answer->getText());
                $this->findApartments();
            }
        );

    }

    private function findApartments()
    {
        $apartments = $this->getContainer()->get(OptionsService::class)->getApartments($this->host, $this->orderedFromDate, $this->orderedToDate );
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
                $this->apartment = $answer->getText();
                foreach ($apartments as $apartment)
                {
                    if($apartment->getNumber() == $answer->getText()){
                        $this->price = $apartment->getPrice();
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
                $this->address = $answer->getText();
                $this->say('Okay. Your apartament is ordered.');
                $this->say('City: ' . $this->city);
                $this->say($this->type . ' : ' . $this->host);
                $this->say('Date: from ' . $this->orderedFromDate->format('Y-m-d') . ' to ' . $this->orderedToDate->format('Y-m-d'));
                $this->say('Price: ' . $this->price);
            }
        );
    }



    public function stopConversation(IncomingMessage $message)
    {
        $orderedRoom = new OrderedRoom();
        $orderedRoom->setApartament($this->apartment['id']);
        $orderedRoom->setPrice($this->apartment['price']);
        $orderedRoom->setOrderedFrom($this->orderedFromDate);
        $orderedRoom->setOrderedTo($this->orderedToDate);


        return $message->getMessage() === 'stop';
    }
}