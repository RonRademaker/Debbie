<?php

namespace ConnectHolland\HealthCheckBundle\Health\Runner;

use ConnectHolland\HealthCheckBundle\Health\Loader\LoaderInterface;
use ConnectHolland\HealthCheckBundle\Health\Test\TestInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


/**
 * Runs the healthtests
 *
 * @author Ron Rademaker
 */
interface RunnerInterface
{
    /**
     * Create a new Runner
     *
     * @param LoaderInterface $loader
     * @param EventDispatcher $eventDispatcher
     */

    public function __construct(LoaderInterface $loader, EventDispatcherInterface $eventDispatcher);

    /**
     * Run all tests
     */
    public function run();

    /**
     * Run an individual test
     *
     * @param TestInterface $test
     * @return bool
     */
    public function runTest(TestInterface $test);

}
