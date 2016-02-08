<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\HealthCheckBundle\Health\Assertion\MaximalVersion;
use ConnectHolland\HealthCheckBundle\Health\Assertion\MinimalVersion;

/**
 * Test to check for the correct PHP version
 *
 * @author Ron Rademaker
 */
class PHPVersion extends AbstractTest
{
    /**
     * Minimal required version
     *
     * @var string
     */
    private $min;

    /**
     * Max allowed version
     *
     * @var string
     */
    private $max;

    /**
     * Actual PHP version
     * In a local variable for testing purposes only
     *
     * @var string
     */
    private $phpVersion;

    /**
     * Creates a new PHPVersopm test
     *
     * @param string $min
     * @param string $max - optional
     */
    public function __construct($min, $max = null)
    {
        $this->min = $min;
        $this->max = $max;
        $this->phpVersion = PHP_VERSION;
    }

    /**
     * Runs the test
     */
    public function run()
    {
        $this->assert(new MinimalVersion($this->phpVersion, $this->min));
        if (isset($this->max)) {
            $this->assert(new MaximalVersion($this->phpVersion, $this->max));
        }
    }
}
