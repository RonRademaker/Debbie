<?php

namespace ConnectHolland\HealthCheckBundle\Health\Suite;

use ConnectHolland\HealthCheckBundle\Health\Runner\RunnerInterface;

/**
 * Collection of health tests
 *
 * @author Ron Rademaker
 */
interface SuiteInterface
{
    /**
     * Run the test in this suite in $runner
     *
     * @param RunnerInterface $runner
     */
    public function run(RunnerInterface $runner);

    /**
     * Gets an array of test results for the executed tests
     *
     * #return array
     */
    public function getResults();
}
