<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Assertion confirming something
 *
 * @author Ron Rademaker
 */
interface AssertionInterface
{
    /**
     * Returns if the terms of the assertion are met
     *
     * @return boolean
     */
    public function assert();

    /**
     * Return true if this assertion failed
     *
     * @return boolean
     */
    public function isFailed();

    /**
     * Return true if this assertion has been asserted (i.e. a test is done)
     *
     * @return boolean
     */
    public function isExecuted();
}
