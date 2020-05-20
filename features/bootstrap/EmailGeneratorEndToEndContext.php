<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;

class EmailGeneratorEndToEndContext implements Context
{
    /** @var string */
    private $employeeName;

    /** @var string */
    private $generatedEmail;

    /** @var array */
    private $originalConfig = [];

    /** @var string */
    private $filePath;

    /**
     * @BeforeScenario
     */
    public function setUp()
    {
        $this->filePath = __DIR__ . '/../../data/email_generator_config.json';
        $this->originalConfig = json_decode(file_get_contents($this->filePath), true);
    }

    /**
     * @AfterScenario
     */
    public function tearDown()
    {
        file_put_contents($this->filePath, json_encode($this->originalConfig, JSON_PRETTY_PRINT));
        $this->originalConfig = [];
    }

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
        $testConfig = $this->originalConfig;
        $testConfig['email_format'] = $format;
        file_put_contents($this->filePath, json_encode($testConfig, JSON_PRETTY_PRINT));
    }

    /**
     * @When the company email address is generated
     */
    public function theCompanyEmailAddressIsGenerated()
    {
        $commandStatus = null;
        $this->generatedEmail = exec(sprintf('bin/console generate:email:address %s', $this->employeeName), $commandStatus);
    }

    /**
     * @Then it should equal :expected
     */
    public function itShouldEqual(string $expected)
    {
        if ($this->generatedEmail !== $expected) {
            throw new Exception('Email address doesn\'t match expected email address');
        }
    }
}
