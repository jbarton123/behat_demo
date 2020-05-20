<?php

namespace BehatDemo\Generator;

class EmailGenerator
{
    /** @var string */
    private $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function generate(string $employeeName): string
    {
        return str_replace('username', strtolower($employeeName), $this->format);
    }
}
