<?php

namespace BehatDemo\Generator;

use BehatDemo\Generator\Config\EmailGeneratorConfig;

class EmailGenerator
{
    /** @var EmailGeneratorConfig */
    private $emailGeneratorConfig;

    public function __construct(EmailGeneratorConfig $emailGeneratorConfig)
    {
        $this->emailGeneratorConfig = $emailGeneratorConfig;
    }

    public function generate(string $employeeName): string
    {
        return str_replace('username', strtolower($employeeName), $this->emailGeneratorConfig->getEmailFormat());
    }
}
