<?php

use Behat\Behat\Context\Context;
use BehatDemo\Generator\Config\EmailGeneratorConfig;
use BehatDemo\Generator\EmailGenerator;

class EmailGeneratorContext implements Context
{
    /** @var string */
    private $employeeName;

    /** @var string */
    private $generatedEmail;

    /** @var EmailGenerator */
    private $emailGenerator;

    /**
     * @Given :name has joined the company
     */
    public function hasJoinedTheCompany(string $name)
    {
        $this->employeeName = $name;
    }

    /**
     * @Given the company email format is :format
     */
    public function theCompanyEmailFormatIs(string $format)
    {
        $this->emailGenerator = new EmailGenerator(new EmailGeneratorConfig($format));
    }

    /**
     * @When the company email address is generated
     */
    public function theCompanyEmailAddressIsGenerated()
    {
        $this->generatedEmail = $this->emailGenerator->generate($this->employeeName);
//        $this->generatedEmail = str_replace('username', strtolower($this->employeeName), $this->emailFormat);
    }

    /**
     * @Then it should equal :expected
     */
    public function itShouldEqual(string $expected)
    {
        assert($this->generatedEmail === $expected);
    }
}
