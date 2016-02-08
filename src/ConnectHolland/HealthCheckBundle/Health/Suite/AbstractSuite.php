<?php

namespace ConnectHolland\HealthCheckBundle\Health\Suite;

use ConnectHolland\HealthCheckBundle\Health\Runner\RunnerInterface;

/**
 * Basic collection of health tests
 *
 * @author Ron Rademaker
 */
abstract class AbstractSuite implements SuiteInterface
{
    /**
     * Test results for this suite
     *
     * @var array
     */
    private $results;

    /**
     * Run the test in this suite in $runner
     *
     * @param RunnerInterface $runner
     */
    public function run(RunnerInterface $runner)
    {
        $tests = $this->getTests();

        foreach ($tests as $test) {
            $this->results[] = $runner->runTest($test);
        }
    }

    /**
     * Gets an array of test results for the executed tests
     *
     * #return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Gets the tests in this suite
     *
     * @return array
     */
    abstract protected function getTests();
}
