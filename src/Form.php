<?php

namespace Metup\Boomstick;

class Form
{
    public $type = 'form';
    public $items = [];
    /**
     * @param string $string
     * @param array $array
     */
    private function __construct(string $name, array $items = [])
    {
        $this->name = $name;
        $this->items = $items;
    }

    public static function create(string $name, array $items) :self
    {
        return new self($name, $items);
    }
}