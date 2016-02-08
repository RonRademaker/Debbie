<?php

namespace ConnectHolland\HealthCheckBundle\Health\Listener;

use ConnectHolland\HealthCheckBundle\Health\Controller\ControllerInterface;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestEvents;
use ConnectHolland\HealthCheckBundle\Health\Event\HealthTestSuiteEvent;
use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for the listener
 *
 * @author Ron Rademaker
 */
class SimpleListenerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests if the result get registered
     */
    public function testTestSuiteEnded()
    {
        $event = new HealthTestSuiteEvent(Mockery::mock(SuiteInterface::class));
        $controller = \Mockery::mock(ControllerInterface::class);
        $controller->shouldIgnoreMissing();

        $listener = new SimpleListener($controller);
        $listener->testSuiteEnded($event);

        $controller->shouldHaveReceived('registerSuiteResult')->once();
    }

    /**
     * Tests if the correct events are subscribed to
     */
    public function testGetSubscribedEvents()
    {
        $this->assertEquals(
            [
                HealthTestEvents::ASSERTION_FAILED => 'testAssertionFailed',
                HealthTestEvents::ASSERTION_SUCCEEDED => 'testAssertionSucceeded',
                HealthTestEvents::TEST_ENDED => 'testEnded',
                HealthTestEvents::TEST_FAILED => 'testFailed',
                HealthTestEvents::TEST_STARTED => 'testStarted',
                HealthTestEvents::TEST_SUCCEEDED => 'testSucceeded',
                HealthTestEvents::TESTSUITE_ENDED => 'testSuiteEnded',
                HealthTestEvents::TESTSUITE_STARTED => 'testSuiteStarted'
            ],
            SimpleListener::getSubscribedEvents()
        );
    }
}
