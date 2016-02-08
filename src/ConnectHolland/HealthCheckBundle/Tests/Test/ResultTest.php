<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Representation of a test result
 *
 * @author Ron Rademaker
 */
class ResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test setter for result
     */
    public function testSet()
    {
        $result = new Result();
        $result->set(ResultInterface::SUCCESS);

        $this->assertAttributeEquals(ResultInterface::SUCCESS, 'result', $result);
    }

    /**
     * Test setter for a test
     */
    public function testSetTest()
    {
        $test = Mockery::mock(TestInterface::class);
        $result = new Result();
        $result->setTest($test);

        $this->assertAttributeEquals($test, 'test', $result);
    }

    /**
     * Test getter for result
     *
     * @depends testSet
     */
    public function testGet()
    {
        $result = new Result();
        $result->set(ResultInterface::SUCCESS);

        $this->assertEquals(ResultInterface::SUCCESS, $result->get());
    }

    /**
     * Test getter for a test
     *
     * @depends testSetTest
     */
    public function testGetTest()
    {
        $test = Mockery::mock(TestInterface::class);
        $result = new Result();
        $result->setTest($test);

        $this->assertEquals($test, $result->getTest());
    }

}
