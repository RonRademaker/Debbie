<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\HealthCheckBundle\Health\Assertion\IPPort;
use ConnectHolland\HealthCheckBundle\Health\Assertion\ValidIP;

/**
 * Test to verify the availability of a service
 *
 * @author Ron Rademaker
 */
abstract class AvailableService extends AbstractTest {
    /**
     * The IP or hostname the service should be available at
     * 
     * @var string
     */
    private $ip;
    
    /**
     * Creates a new service check
     * 
     * @param string $ip - a hostname may be passed in
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }
    
    /**
     * Check if the service is available at the given port
     */
    public function run() {
        if (filter_var($this->ip, FILTER_VALIDATE_IP) === false) {
            $ip = gethostbyname($this->ip);
        } else {
            $ip = $this->ip;
        }
        
        $this->assert(new ValidIP($ip));
        $this->assert(new IPPort($ip, $this->getPort()));
    }
    
    /**
     * Gets the port number the service should be running on
     * 
     * @return integer
     */
    abstract protected function getPort();
    

}
