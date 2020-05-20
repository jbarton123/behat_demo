<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /** @var string */
    private $greeting;

    /** @var string */
    private $name;
    
    /**
     * @Given My name is :name
     */
    public function myNameIs(string $name)
    {
        $this->name = $name;
    }

    /**
     * @When I am greeted
     */
    public function iAmGreeted()
    {
        $this->greeting = sprintf('Hello %s', $this->name);
    }

    /**
     * @Then I see :expectedOutput
     */
    public function iSee(string $expectedOutput)
    {
        if ($this->greeting !== $expectedOutput) {
            throw new Exception(sprintf('Expected "%s" but got "%s"', $expectedOutput, $this->greeting));
        }
    }
}
