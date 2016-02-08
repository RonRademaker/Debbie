<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

/**
 * Representation of a test result
 *
 * @author Ron Rademaker
 */
interface ResultInterface
{
    /**
     * Success
     */
    const SUCCESS = 1;

    /**
     * Failure
     */
    const FAILURE = 0;

    /**
     * Sets the test result
     *
     * @param integer $result
     */
    public function set($result);

    /**
     * Sets the test this is the result of
     *
     * @param TestInterface $test
     */
    public function setTest(TestInterface $test);

    /**
     * Gets the test result
     *
     * @return integer
     */
    public function get();

    /**
     * Sets the test this is the result of
     *
     * @return TestInterface
     */
    public function getTest();
}
