<?php

namespace ConnectHolland\HealthCheckBundle\Health\Controller;

use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;

/**
 * Interface defining how results are to be transport back into the controller
 *
 * @author Ron Rademaker
 */
interface ControllerInterface
{
    /**
     * Register the test results of the tests in $suite
     * 
     * @param SuiteInterface $suite
     */
    public function registerSuiteResult(SuiteInterface $suite);
}
