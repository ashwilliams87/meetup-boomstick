<?php

namespace Ebs\Tests;

use Lan\Ebs\Boomstick\Items\Common\Action;
use Lan\Ebs\Boomstick\Items\Tabs;
use Tests\Support\UnitTester;

class JsonMetupTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testSimpleUnitTest()
    {
        $emptyJsonString = '{}';
        $this->assertJson($emptyJsonString);

        $object = new \stdClass();
        $myObjectJsonString = json_encode($object);

        $this->assertJson($myObjectJsonString);

        $this->assertJsonStringEqualsJsonString($emptyJsonString, $myObjectJsonString);

        $jsonStringWithField = '{"name":"Jack"}';

        $this->assertJson($jsonStringWithField);

        $this->assertJsonStringEqualsJsonString($jsonStringWithField, $myObjectJsonString);
    }

    public function testButton()
    {

        $button = new \stdClass();
        $button->type = 'button';
        $button->name = 'download_button';
        $button->caption = 'Скачать';

        $expectedButtonJson = json_encode($button);

        codecept_debug($expectedButtonJson);

        $this->assertJson($expectedButtonJson);

        // $button = new Button('download_button','Скачать');

    }

    public function testSelect()
    {

    }

    public function testForm()
    {

    }


}
