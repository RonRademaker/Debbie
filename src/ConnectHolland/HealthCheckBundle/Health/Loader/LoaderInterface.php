<?php

namespace ConnectHolland\HealthCheckBundle\Health\Loader;

/**
 * Loader to load suites
 *
 * @author Ron Rademaker
 */
interface LoaderInterface
{
    /**
     * Loads all the suites
     *
     * @return array
     */
    public function loadSuites();
}
