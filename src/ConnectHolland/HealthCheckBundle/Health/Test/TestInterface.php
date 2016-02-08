<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\HealthCheckBundle\Health\Assertion\AssertionInterface;

/**
 * A single healthtest
 *
 * @author Ron Rademaker
 */
interface TestInterface
{
    /**
     * Runs the test
     */
    public function run();

    /**
     * Assert $assertion
     */
    public function assert(AssertionInterface $assertion);

    /**
     * Gets the executed assertions
     *
     * @return array
     */
    public function getAssertions();
}
