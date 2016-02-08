<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\HealthCheckBundle\Health\Assertion\AssertionInterface;

/**
 * Base Test implementation
 *
 * @author Ron Rademaker
 */
abstract class AbstractTest implements TestInterface
{
    /**
     * The assertions executed for the test
     *
     * @var array
     */
    private $assertions = [];

    /**
     * Assert $assertion
     */
    public function assert(AssertionInterface $assertion)
    {
        $assertion->assert();

        $this->assertions[] = $assertion;
    }

    /**
     * Gets the executed assertions
     *
     * @return array
     */
    public function getAssertions()
    {
        return $this->assertions;
    }
}
