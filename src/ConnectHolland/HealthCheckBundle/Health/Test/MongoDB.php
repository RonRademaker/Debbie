<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

/**
 * Test availability of the MongoDB service
 *
 * @author Ron Rademaker
 */
class MongoDB extends AvailableService {
    /**
     * Returns the default mongo port
     */
    protected function getPort() {
        return 27017;
    }
}
