<?php

namespace ConnectHolland\HealthCheckBundle\Health\Event;

use ConnectHolland\HealthCheckBundle\Health\Test\TestInterface;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for the health test event
 *
 * @author Ron Rademaker
 */
class HealthTestEventTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test creating an event
     */
    public function testConstructor()
    {
        $testMock = Mockery::mock(TestInterface::class);
        $event = new HealthTestEvent($testMock);
        $this->assertAttributeEquals($testMock, 'test', $event);
    }

    /**
     * Basic getter test
     *
     * @depends testConstructor
     */
    public function testGetTest()
    {
        $testMock = Mockery::mock(TestInterface::class);
        $event = new HealthTestEvent($testMock);
        $this->assertEquals($testMock, $event->getTest());
    }
}
