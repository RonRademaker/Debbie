<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Confirm something is a ValidIP
 *
 * @author Ron Rademaker
 */
class ValidIP extends AbstractAssertion {
    /**
     * The IP to assert
     * 
     * @var string
     */
    private $ip;
    
    /**
     * Create a new ValidIP assertion
     * 
     * @param string $ip
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }
    
    /**
     * Assert the set IP is an IP
     */
    public function assert() {
        if (filter_var($this->ip, FILTER_VALIDATE_IP) === false) {
            $this->fail();
        } else {
            $this->succeed();
        }
    }

}
