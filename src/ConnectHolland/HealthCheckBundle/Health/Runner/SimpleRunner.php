<?php

namespace ConnectHolland\HealthCheckBundle\Health\Runner;

use ConnectHolland\HealthCheckBundle\Health\Assertion\AssertionInterface;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestEvent;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestEvents;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestSuiteEvent;
use ConnectHolland\HealthCheckBundle\Health\Loader\LoaderInterface;
use ConnectHolland\HealthCheckBundle\Health\Test\Result;
use ConnectHolland\HealthCheckBundle\Health\Test\ResultInterface;
use ConnectHolland\HealthCheckBundle\Health\Test\TestInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


/**
 * Base implementation of a Runner
 *
 * @author Ron Rademaker
 */
class SimpleRunner implements RunnerInterface
{
    /**
     * The event dispatcher
     *
     * @var EventDispatcher
     */
    private $eventDispatcher;

    /**
     * Test loader
     *
     * @var LoaderInterface
     */
    private $loader;

    /**
     * Create a new Runner
     *
     * @param LoaderInterface $loader
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(LoaderInterface $loader, EventDispatcherInterface $eventDispatcher)
    {
        $this->loader = $loader;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Run all tests
     */
    public function run()
    {
        $suites = $this->loader->loadSuites();
        foreach ($suites as $suite) {
            $this->eventDispatcher->dispatch(HealthTestEvents::TESTSUITE_STARTED, new HealthTestSuiteEvent($suite));
            $suite->run($this);
            $this->eventDispatcher->dispatch(HealthTestEvents::TESTSUITE_ENDED, new HealthTestSuiteEvent($suite));
        }
    }

    /**
     * Run an individual test
     *
     * @param TestInterface $test
     * @return ResultInterface
     */
    public function runTest(TestInterface $test)
    {
        $this->eventDispatcher->dispatch(HealthTestEvents::TEST_STARTED, new HealthTestEvent($test));
        $test->run();

        $assertions = $test->getAssertions();
        $failed = false;

        foreach ($assertions as $assertion) {
            $failed = $failed || $this->processAssertion($test, $assertion);
        }

        $result = new Result();
        $result->setTest($test);
        $result->set(($failed === true) ? ResultInterface::FAILURE : ResultInterface::SUCCESS);

        $this->eventDispatcher->dispatch(($failed === true) ? HealthTestEvents::TEST_FAILED : HealthTestEvents::TEST_SUCCEEDED, new HealthTestEvent($test));
        $this->eventDispatcher->dispatch(HealthTestEvents::TEST_ENDED, new HealthTestEvent($test));

        return $result;
    }

    /**
     * Processes an assertion of a test
     *
     * @param TestInterface $test
     * @param AssertionInterface $assertion
     * @return bool
     */
    private function processAssertion(TestInterface $test, AssertionInterface $assertion)
    {
        if ($assertion->isFailed()) {
            $this->eventDispatcher->dispatch(HealthTestEvents::ASSERTION_FAILED, new HealthTestEvent($test));

            return true;
        } else {
            $this->eventDispatcher->dispatch(HealthTestEvents::ASSERTION_SUCCEEDED, new HealthTestEvent($test));

            return false;
        }
    }
}
