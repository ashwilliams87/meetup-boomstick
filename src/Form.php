<?php

namespace Metup\Boomstick;

class Form
{

    /**
     * @param string $string
     * @param array $array
     */
    public function __construct(string $string, array $array)
    {
        $this->type = 'form';
        $this->name = 'meetup_form';
        $this->items = [];
    }
}