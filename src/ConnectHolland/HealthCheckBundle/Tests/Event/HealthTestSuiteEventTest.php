<?php

namespace ConnectHolland\HealthCheckBundle\Health\Event;

use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for the health testsuite event
 *
 * @author Ron Rademaker
 */
class HealthTestSuiteEventTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test creating an event
     */
    public function testConstructor()
    {
        $testMock = Mockery::mock(SuiteInterface::class);
        $event = new HealthTestSuiteEvent($testMock);
        $this->assertAttributeEquals($testMock, 'suite', $event);
    }

    /**
     * Basic getter test
     *
     * @depends testConstructor
     */
    public function testGetTest()
    {
        $testMock = Mockery::mock(SuiteInterface::class);
        $event = new HealthTestSuiteEvent($testMock);
        $this->assertEquals($testMock, $event->getSuite());
    }
}
