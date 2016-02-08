<?php

namespace ConnectHolland\HealthCheckBundle\Health\Event;

use ConnectHolland\HealthCheckBundle\Health\Test\TestInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event related to a HealthTest
 *
 * @author Ron Rademaker
 */
class HealthTestEvent extends Event
{
    /**
     * The test
     *
     * @var TestInterface $test
     */
    private $test;

    /**
     * Create a new HealthTestEvent
     *
     * @param TestInterface $test
     */
    public function __construct(TestInterface $test)
    {
        $this->test = $test;
    }

    /**
     * Gets the test
     *
     * @return TestInterface
     */
    public function getTest()
    {
        return $this->test;
    }
}
