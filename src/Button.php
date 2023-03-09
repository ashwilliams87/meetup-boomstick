<?php

namespace Metup\Boomstick;

class Button
{
    /**
     * @param string $string
     * @param string $string1
     */
    public function __construct(string $name, string $label)
    {
        $this->type = 'button';
        $this->name = 'download_button';
        $this->label = 'Скачать';
    }
}