<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

use PHPUnit_Framework_TestCase;

/**
 * Unit test to connect using PDO
 *
 * @author Ron Rademaker
 */
class PDOAssertionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Try successful connection
     */
    public function testSuccess()
    {
        $assertion = new PDOAssertion('sqlite:unittest.sqlite');
        $assertion->assert();

        $this->assertTrue($assertion->isExecuted());
        $this->assertFalse($assertion->isFailed());

        unlink('unittest.sqlite');
    }

    /**
     * Try failing connection
     */
    public function testFailure()
    {
        $assertion = new PDOAssertion('mysql:dbname=foobar;host=127.0.0.1', 'Debbie', 'Unittest'); // unlikely someone will use this
        $assertion->assert();

        $this->assertTrue($assertion->isExecuted());
        $this->assertTrue($assertion->isFailed());
    }
}
