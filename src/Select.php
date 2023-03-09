<?php
namespace Metup\Boomstick;
class Select
{
    public function __construct(string $string, string $string1, array $options, string $string2)
    {
        $this->type = 'select';
        $this->name = 'select_of_cities';
        $this->label = 'Города';
        $this->options = $options;
        $this->value = 'spb';
    }
}