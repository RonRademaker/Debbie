<?php

namespace ConnectHolland\HealthCheckBundle\Health\Listener;

use ConnectHolland\HealthCheckBundle\Health\Controller\ControllerInterface;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestEvent;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestEvents;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestSuiteEvent;

/**
 * Basic Listener for test results
 *
 * @author Ron Rademaker
 */
class SimpleListener implements ListenerInterface
{
    /**
     * Controller to report results to
     *
     * @var ControllerInterface
     */
    private $controller;

    /**
     * Creates a new SimpleListener
     * @param ControllerInterface $controller
     */
    public function __construct(ControllerInterface $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Handles a failed assertion
     *
     * @param HealthTestEvent $event
     */
    public function testAssertionFailed(HealthTestEvent $event)
    {

    }

    /**
     * Handles a succeeded assertion
     *
     * @param HealthTestEvent $event
     */
    public function testAssertionSucceeded(HealthTestEvent $event)
    {

    }

    /**
     * Handles a test end
     *
     * @param HealthTestEvent $event
     */
    public function testEnded(HealthTestEvent $event)
    {

    }

    /**
     * Handles a test failure
     *
     * @param HealthTestEvent $event
     */
    public function testFailed(HealthTestEvent $event)
    {

    }

    /**
     * Handles a test start
     *
     * @param HealthTestEvent $event
     */
    public function testStarted(HealthTestEvent $event)
    {

    }

    /**
     * Handles a succeeded test
     *
     * @param HealthTestEvent $event
     */
    public function testSucceeded(HealthTestEvent $event)
    {

    }

    /**
     * Registers the suite result to the controller
     *
     * @param HealthTestSuiteEvent $event
     */
    public function testSuiteEnded(HealthTestSuiteEvent $event)
    {
        $this->controller->registerSuiteResult($event->getSuite());
    }

    /**
     * Start a new suite
     *
     * @param HealthTestSuiteEvent $event
     */
    public function testSuiteStarted(HealthTestSuiteEvent $event)
    {
     
    }

    /**
     * Gets the events to subscribe to
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            HealthTestEvents::ASSERTION_FAILED => 'testAssertionFailed',
            HealthTestEvents::ASSERTION_SUCCEEDED => 'testAssertionSucceeded',
            HealthTestEvents::TEST_ENDED => 'testEnded',
            HealthTestEvents::TEST_FAILED => 'testFailed',
            HealthTestEvents::TEST_STARTED => 'testStarted',
            HealthTestEvents::TEST_SUCCEEDED => 'testSucceeded',
            HealthTestEvents::TESTSUITE_ENDED => 'testSuiteEnded',
            HealthTestEvents::TESTSUITE_STARTED => 'testSuiteStarted'
        ];
    }
}
