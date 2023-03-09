<?php

namespace Metup\Boomstick;

class Button
{
    public $type = 'button';
    public $name;
    public $label;

    /**
     * @param string $string
     * @param string $string1
     */
    private function __construct(string $name = 'default_button', string $label = 'default_label_button')
    {
        $this->name = $name;
        $this->label = $label;
    }

    public static function create(string $name, string $label): self
    {
        return new self($name, $label);
    }
}