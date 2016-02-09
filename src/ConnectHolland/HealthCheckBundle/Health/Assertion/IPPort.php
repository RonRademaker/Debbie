<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Assertion to confirm a port is open at an IP
 *
 * @author Ron Rademaker
 */
class IPPort extends AbstractAssertion {
    /**
     * The IP
     * 
     * @var string
     */
    private $ip;
    
    /**
     * The port number
     * 
     * @var integer
     */
    private $port;
    
    /**
     * Create a new IPPort
     * 
     * @param string $ip
     * @param integer $port
     */
    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }
    
    /**
     * Checks if port is open at ip
     */
    public function assert() {
         $connection = @fsockopen($this->ip, $this->port);

        if (is_resource($connection)) {
            fclose($connection);
            $this->succeed();
        } else {
            $this->fail();
        }
    }
    
    /**
     * Include IP and port in the representation
     * 
     * @return string
     */
    public function __toString() {
        return sprintf(
            '%s - %s:%s',
            parent::__toString(),
            $this->ip,
            $this->port
        );
    }

}
