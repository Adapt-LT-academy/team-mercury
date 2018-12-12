<?php
/**
 * Created by PhpStorm.
 * User: indre
 * Date: 18.12.11
 * Time: 13.07
 */

namespace App\Tests\acceptance;
use App\Tests\AcceptanceTester;
use Codeception\Example;

class ApplicationAvailabilityCest
{
    /**
     * @dataProvider pageProvider
     */
    public function testAvailability(AcceptanceTester $I, Example $example)
    {
        $I->amOnPage($example['url']);
        $I->canSeeResponseCodeIsSuccessful();
    }
    /**
     * @return array
     */
    protected function pageProvider()
    {
        return [
            ['url' => '/', 'title' => ''],
            ['url' => '/message', 'title' => ''],
            ['url' => '/chat', 'title' => ''],
        ];
    }

}