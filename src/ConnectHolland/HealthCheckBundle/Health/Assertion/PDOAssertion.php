<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

use PDO;
use PDOException;

/**
 * Assertion to attempt connecting a PDO instance
 *
 * @author Ron Rademaker
 */
class PDOAssertion extends AbstractAssertion
{
    /**
     * The dsn to attempt to connect to
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
     * Create a new PDOAssertion
     *
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     */
    public function __construct($dsn, $username = null, $password = null, array $options = array())
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }

    /**
     * Assert a connection can be made
     */
    public function assert()
    {
        try {
            new PDO($this->dsn, $this->username, $this->password, $this->options);
            $this->succeed();
        } catch (PDOException $ex) {
            $this->fail();
        }
    }
}
