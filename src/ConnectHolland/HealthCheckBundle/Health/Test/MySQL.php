<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\HealthCheckBundle\Health\Assertion\PDOAssertion;

/**
 * Test availability of the MySQL service
 *
 * @author Ron Rademaker
 */
class MySQL extends AvailableService {
    /**
     * Optional dsn to attempt to connect to
     *
     * @var string
     */
    private $dsn;

    /**
     * Optional username for connection
     *
     * @var string
     */
    private $username;

    /**
     * Optional password for connection
     *
     * @var string
     */
    private $password;

    /**
     * Optional connection options
     *
     * @var array
     */
    private $options = [];

    /**
     * Construct a new MySQL service test
     *
     * @param string $ip
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     */
    public function __construct($ip, $dsn = null, $username = null, $password = null, array $options = array())
    {
        parent::__construct($ip);
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }

    /**
     * Runs all assertions
     */
    public function run()
    {
        parent::run();
        if (isset($this->dsn)) {
            $this->assert(new PDOAssertion($this->dsn, $this->username, $this->password, $this->options));
        }
    }

     /**
     * Returns the default mysql port
     */
    protected function getPort() {
        return 3306;
    }
}
