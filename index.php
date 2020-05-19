<?php

use BehatDemo\Console\Command\GenerateEmailAddressCommand;
use BehatDemo\Generator\Config\EmailGeneratorConfig;
use BehatDemo\Generator\EmailGenerator;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$application = new Application('Behat demo', '1.0.0');

$emailGeneratorConfig = new EmailGeneratorConfig('username@inviqa.com');
$emailGenerator = new EmailGenerator($emailGeneratorConfig);

$application->add(new GenerateEmailAddressCommand($emailGenerator));

$application->run();
