<?php

namespace ConnectHolland\HealthCheckBundle\Health\Loader;

use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;

/**
 * Simple Loader to load suites
 *
 * @author Ron Rademaker
 */
class SimpleLoader implements LoaderInterface
{
    /**
     * The suites
     *
     * @var array
     */
    private $suites = [];

    /**
     * registerSuite
     *
     * @param SuiteInterface $suite
     */
    public function registerSuite(SuiteInterface $suite)
    {
        $this->suites[] = $suite;
    }

    /**
     * Loads all the suites
     *
     * @return array
     */
    public function loadSuites()
    {
        return $this->suites;
    }
}
