<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    protected $monkeyCount = 0;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I have :arg1 monkeys
     */
    public function iHaveMonkeys($arg1)
    {
        $this->monkeyCount = (int) $arg1;
    }

    /**
     * @When I get :arg1 more monkeys
     */
    public function iGetMoreMonkeys($arg1)
    {
        $this->monkeyCount += (int) $arg1;
    }

    /**
     * @Then I should have :arg1 monkeys
     */
    public function iShouldHaveMonkeys($arg1)
    {
        assert($this->monkeyCount == (int) $arg1, "We expected $arg1 monkeys, but found " . $this->monkeyCount);
        echo "We have $this->monkeyCount monkeys\n";
        echo "Expected $arg1 monkeys\n";
        echo "Assertion: " . ($this->monkeyCount == (int) $arg1 ? 'true' : 'false') . "\n";

    }
}
