<?php

namespace BehatDemo\Generator\Config;

class EmailGeneratorConfig
{
    /** @var string */
    private $format = '';

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function getEmailFormat(): string
    {
        return $this->format;
    }
}
