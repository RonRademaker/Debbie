<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

/**
 * Representation of a test result
 *
 * @author Ron Rademaker
 */
class Result implements ResultInterface
{
    /**
     * The test result
     *
     * @var integer
     */
    private $result;

    /**
     * The test
     *
     * @var TestInterface
     */
    private $test;

    /**
     * Sets the test result
     *
     * @param integer $result
     */
    public function set($result)
    {
        $this->result = $result;
    }

    /**
     * Sets the test this is the result of
     *
     * @param TestInterface $test
     */
    public function setTest(TestInterface $test)
    {
        $this->test = $test;
    }

    /**
     * Gets the test result
     *
     * @return integer
     */
    public function get()
    {
        return $this->result;
    }

    /**
     * Sets the test this is the result of
     *
     * @return TestInterface
     */
    public function getTest()
    {
        return $this->test;
    }
}
