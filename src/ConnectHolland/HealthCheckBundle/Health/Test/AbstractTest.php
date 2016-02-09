<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\HealthCheckBundle\Health\Assertion\AssertionInterface;

/**
 * Base Test implementation
 *
 * @author Ron Rademaker
 */
abstract class AbstractTest implements TestInterface
{
    /**
     * The assertions executed for the test
     *
     * @var array
     */
    private $assertions = [];
    
    /**
     * Boolean indicating the test failed
     * 
     * @var bool
     */
    private $failed = false;

    /**
     * Assert $assertion if not failed
     */
    public function assert(AssertionInterface $assertion)
    {
        if ($this->failed === false) {
            $assertion->assert();
        
            if ($assertion->isFailed()) {
                $this->failed = true;
            }
        }

        $this->assertions[] = $assertion;
    }

    /**
     * Gets the executed assertions
     *
     * @return array
     */
    public function getAssertions()
    {
        return $this->assertions;
    }
}
