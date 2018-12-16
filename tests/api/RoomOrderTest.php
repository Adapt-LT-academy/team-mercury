<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.12.3
 * Time: 10.18
 */

namespace App\Tests\api;

use App\Tests\ApiTester;


class RoomOrderTest
{
    public function getResponse(ApiTester $I)
    {
        $I->wantTo('Check if botman message endpoint responds');
        $I->sendBotMessage('message', 'Hi');
        $I->seeResponseContainsJson(['messages' => [['text' => 'In which city do you want to stay?']]]);
        $I->sendBotMessage('message', 'Vilnius');
        $I->seeResponseContainsJson(['messages' => [['text' => 'In which type of host do you want to stay?']]]);
        $I->sendBotMessage('message', 'hostel');
        $I->seeResponseContainsJson(['messages' => [['text' => 'In which hostel do you want to stay?']]]);
        $I->sendBotMessage('message', 'Baltazaras');
        $I->seeResponseContainsJson(['messages' => [['text' => 'When do you want to come?']]]);
        $I->sendBotMessage('message', '2011-01-01');
        $I->seeResponseContainsJson(['messages' => [['text' => 'When do you want to leave?']]]);
        $I->sendBotMessage('message', '2011-01-02');
        $I->seeResponseContainsJson(['messages' => [['text' => 'In which apartment do you want to stay?']]]);
        $I->sendBotMessage('message', '101');
        $I->seeResponseContainsJson(['messages' => [['text' => 'What is your name?']]]);
        $I->sendBotMessage('message', 'Customer1');
        $I->seeResponseContainsJson(
            [
                'messages' =>
                    [
                        ['text' => 'Okay. Your apartament is ordered.'],
                        ['text' => 'City: Vilnius'],
                        ['text' => 'hostel: Baltazaras'],
                        ['text' => 'Date: from 2011-01-01 to 2011-01-01'],
                        ['text' => 'Price: 201'],

                    ],
            ]
        );
        $I->assertEquals(
            [
                'messages' =>
                    [
                        ['text' => 'Okay. Your apartament is ordered.'],
                        ['text' => 'City: Vilnius'],
                        ['text' => 'hostel: Baltazaras'],
                        ['text' => 'Date: from 2011-01-01 to 2011-01-01'],
                        ['text' => 'Price: 201'],

                    ],
            ]
        );
    }
}