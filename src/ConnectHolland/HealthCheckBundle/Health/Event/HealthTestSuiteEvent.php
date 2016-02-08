<?php

namespace ConnectHolland\HealthCheckBundle\Health\Event;

use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Event related to a test suite
 *
 * @author Ron Rademaker
 */
class HealthTestSuiteEvent extends Event
{
    /**
     * The test suite
     *
     * @var SuiteInterface $suite
     */
    private $suite;

    /**
     * Create a new HealthTestSuiteEvent
     *
     * @param SuiteInterface $suite
     */
    public function __construct(SuiteInterface $suite)
    {
        $this->suite = $suite;
    }

    /**
     * Gets the suite
     *
     * @return SuiteInterface
     */
    public function getSuite()
    {
        return $this->suite;
    }
}
