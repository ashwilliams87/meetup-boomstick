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

    public static function create(string $name, array $items = []): self
    {
        return new self($name, $items);
    }

    public function addButton(string $name, string $label)
    {
        $this->items[] = Button::create($name, $label);
        return $this;
    }

    public function addSelect(string $name, string $label, array $options, string $value)
    {
        $this->items[] = Select::create($name, $label, $options, $value);
        return $this;
    }
}