<?php

namespace ConnectHolland\HealthCheckBundle\Health\Suite;

use ConnectHolland\HealthCheckBundle\Health\Test\TestInterface;

/**
 * Test suite with configurable 'contents'
 *
 * @author Ron Rademaker
 */
class ConfigurableSuite extends AbstractSuite
{
    /**
     * The tests
     *
     * @var array
     */
    private $tests = [];

    /**
     * Add a test
     *
     * @param TestInterface $test
     */
    public function addTest(TestInterface $test)
    {
        $this->tests[] = $test;
    }

    /**
     * Gets the configured tests
     *
     * @return array
     */
    protected function getTests()
    {
        return $this->tests;
    }
}
