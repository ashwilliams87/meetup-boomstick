<?php

namespace Metup\Boomstick;
class Select
{
    public $type = 'select';
    public $name;
    public $label;

    public function __construct(string $name = 'default_select_name', string $label = 'default_city', array $options = [], string $value = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
    }

    public static function create(string $name, string $label, array $options, string $value) : self
    {
        return new self($name, $label, $options, $value);
    }
}