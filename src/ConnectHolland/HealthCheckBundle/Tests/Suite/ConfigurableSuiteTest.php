<?php

namespace ConnectHolland\HealthCheckBundle\Health\Suite;

use PHPUnit_Framework_TestCase;

/**
 * Unit test for the ConfigurableSuiteTest
 *
 * @author Ron Rademaker
 */
class ConfigurableSuiteTest extends PHPUnit_Framework_TestCase {
    /**
     * Test setter for the name
     */
    public function testSetName()
    {
        $suite = new ConfigurableSuite();
        $suite->setName('foobar');
        
        $this->assertAttributeEquals('foobar', 'name', $suite);
    }
    
    /**
     * Test getter for the name
     *
     * @depends testSetName
     */
    public function testGetName()
    {
        $suite = new ConfigurableSuite();
        $suite->setName('foobar');

        $this->assertEquals('foobar', $suite->getName());
    }
}
