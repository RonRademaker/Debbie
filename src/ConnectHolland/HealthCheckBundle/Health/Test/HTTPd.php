<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

/**
 * Test to check if an HTTP daemon runs at port 80
 *
 * @author Ron Rademaker
 */
class HTTPd extends AvailableService {
    /**
     * Gets the http port
     * 
     * @return int
     */
    protected function getPort() {
        return 80;
    }

}
