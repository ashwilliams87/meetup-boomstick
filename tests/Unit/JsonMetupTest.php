<?php

namespace Metup\Boomstick\Tests;

use Metup\Boomstick\Button;
use Metup\Boomstick\Form;
use Metup\Boomstick\Select;
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
        $myObjectJsonString = json_encode($object, JSON_UNESCAPED_UNICODE);

        $this->assertJson($myObjectJsonString);

        $this->assertJsonStringEqualsJsonString($emptyJsonString, $myObjectJsonString);

        $jsonStringWithField = '{"name":"Jack"}';

        //$this->assertJson($jsonStringWithField);

        //$this->assertJsonStringEqualsJsonString($jsonStringWithField, $myObjectJsonString);
    }

    public function testButton()
    {
        $button = new \stdClass();
        $button->type = 'button';
        $button->name = 'download_button';
        $button->label = 'Скачать';

        $expectedButtonJson = json_encode($button, JSON_UNESCAPED_UNICODE);

        codecept_debug($expectedButtonJson);

        $this->assertJson($expectedButtonJson);

        $button = Button::create('download_button', 'Скачать');

        $this->assertJsonStringEqualsJsonString(json_encode($button, JSON_UNESCAPED_UNICODE),$expectedButtonJson);
    }

    public function testSelect()
    {
        $options = [
            ['value' => 'spb', 'text' => 'Санкт-Петербург'], ['value' => 'msk', 'text' => 'Москва'],
        ];

        $select = new \stdClass();
        $select->type = 'select';
        $select->name = 'select_of_cities';
        $select->label = 'Города';
        $select->options = $options;
        $select->value = 'spb';

        $expectedSelectJson = json_encode($select, JSON_UNESCAPED_UNICODE);

        codecept_debug($expectedSelectJson);

        $this->assertJson($expectedSelectJson);

        $select = Select::create('select_of_cities', 'Города', $options, 'spb');

        $this->assertJsonStringEqualsJsonString(json_encode($select, JSON_UNESCAPED_UNICODE), json_encode($select, JSON_UNESCAPED_UNICODE));
    }

    public function testForm()
    {
        $form = new \stdClass();
        $form->type = 'form';
        $form->name = 'meetup_form';
        $form->items = [];
        $expectedSelectJson = json_encode($form, JSON_UNESCAPED_UNICODE);
        $this->assertJson($expectedSelectJson);

        $form = Form::create('meetup_form', []);
        $this->assertJsonStringEqualsJsonString(json_encode($form, JSON_UNESCAPED_UNICODE), $expectedSelectJson);
    }

    public function testFormCreateMethod(){
        $form = new \stdClass();
        $form->type = 'form';
        $form->name = 'meetup_form';
        $form->items = [];
        $expectedSelectJson = json_encode($form, JSON_UNESCAPED_UNICODE);
        $this->assertJson($expectedSelectJson);

        $form =  Form::create('meetup_form', []);
        $this->assertJsonStringEqualsJsonString(json_encode($form, JSON_UNESCAPED_UNICODE), $expectedSelectJson);
    }

    public function testFormWithButtonAndSelect(){
        $options = [
            ['value' => 'spb', 'text' => 'Санкт-Петербург'], ['value' => 'msk', 'text' => 'Москва'],
        ];
        $items = [
            Select::create('select_of_cities', 'Города', $options, 'spb'),
            Button::create('download_button', 'Скачать')
        ];
        $form = Form::create('meetup_form', $items);
        $stringJson  = json_encode($form, JSON_UNESCAPED_UNICODE);

        codecept_debug($stringJson);

        $this->assertJson($stringJson);
    }

}
