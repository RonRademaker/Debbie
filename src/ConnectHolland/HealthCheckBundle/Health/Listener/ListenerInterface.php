<?php

namespace ConnectHolland\HealthCheckBundle\Health\Listener;

use ConnectHolland\HealthCheckBundle\Health\Controller\ControllerInterface;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestEvent;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestSuiteEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Listener collecting test results
 *
 * @author Ron Rademaker
 */
interface ListenerInterface extends EventSubscriberInterface
{
    /**
     * Creates a new Listener
     *
     * @param ControllerInterface $controller
     */
    public function __construct(ControllerInterface $controller);

    /**
     * Handle the start of a testsuite
     *
     * @param HealthTestSuiteEvent $event
     */
    public function testSuiteStarted(HealthTestSuiteEvent $event);

    /**
     * Handle the end of a testsuite
     *
     * @param HealthTestSuiteEvent $event
     */
    public function testSuiteEnded(HealthTestSuiteEvent $event);

    /**
     * Handle the start of a test
     *
     * @param HealthTestEvent $event
     */
    public function testStarted(HealthTestEvent $event);

    /**
     * Handle the end of a test
     *
     * @param HealthTestEvent $event
     */
    public function testEnded(HealthTestEvent $event);

    /**
     * Handle the failure of an assertion
     *
     * @param HealthTestEvent $event
     */
    public function testAssertionFailed(HealthTestEvent $event);

    /**
     * Handle the success of an assertion
     *
     * @param HealthTestEvent $event
     */
    public function testAssertionSucceeded(HealthTestEvent $event);

    /**
     * Handle the failure of a test
     *
     * @param HealthTestEvent $event
     */
    public function testFailed(HealthTestEvent $event);

    /**
     * Handle the success of a test
     *
     * @param HealthTestEvent $event
     */
    public function testSucceeded(HealthTestEvent $event);
}
