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
    
    /**
     * Gets a string representation of this assertion
     * 
     * @return string
     */
    public function __toString()
    {
        $assertionClass = get_class($this);
        $assertionName = substr($assertionClass, strrpos($assertionClass, '\\') + 1);
        $result = $this->isExecuted() ? ($this->isFailed() ? 'failed' : 'passed') : 'null';
        
        return sprintf(
            '%s:%s:%s',
            $assertionName,
            ($this->isExecuted() ? 'executed' : 'not executed'),
            $result
        );
    }
}
