<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

/**
 * Test availability of the MySQL service
 *
 * @author Ron Rademaker
 */
class MySQL extends AvailableService {
    /**
     * Returns the default mysql port
     */
    protected function getPort() {
        return 3306;
    }
}
