<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Abstract Assertion implementation
 *
 * @author Ron Rademaker
 */
abstract class AbstractAssertion implements AssertionInterface
{
    /**
     * Boolean indicating this assertion's result
     *
     * @var bool
     */
    private $result;

    /**
     * Sets the assertion's result to true (success)
     */
    protected function succeed()
    {
        $this->result = true;
    }

    /**
     * Sets the assertion's result to false (failure)
     */
    protected function fail()
    {
        $this->result = false;
    }

    /**
     * Return true if this assertion failed
     *
     * @return boolean
     */
    public function isFailed()
    {
        return $this->result === false;
    }

    /**
     * Return true if this assertion has been asserted (i.e. a test is done)
     *
     * @return boolean
     */
    public function isExecuted()
    {
        return isset($this->result);
    }
}
