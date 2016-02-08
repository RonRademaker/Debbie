<?php

namespace ConnectHolland\HealthCheckBundle\Health\Test;

use ConnectHolland\WindmillTestUtilities\Utils\Accessor;
use PHPUnit_Framework_TestCase;

/**
 * Unit test for the PHP Version test
 *
 * @author Ron Rademaker
 */
class PHPVersionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test PHP version
     *
     * @dataProvider provideTestVersions
     *
     * @param string $phpVersion
     * @param string $min
     * @param string $max
     * @param bool $expected
     */
    public function testPHPVersion($phpVersion, $min, $max, $expected)
    {
        $versionTest = new PHPVersion($min, $max);
        $accessor = new Accessor($versionTest);
        $accessor->phpVersion = $phpVersion;

        $versionTest->run();

        $failed = false;
        $assertions = $versionTest->getAssertions();
        foreach ($assertions as $assertion) {
            $failed = $failed || $assertion->isFailed();
        }

        $this->assertEquals(!$expected, $failed);
    }

    /**
     * Gets versions to test with
     *
     * @return array
     */
    public function provideTestVersions()
    {
        return [
            ['5.6.2', '5.5.0', '5.7.0', true],
            ['5.6.2', '5.5.0', null, true],
            ['5.5.2', '5.6.0', null, false],
            ['5.5.2', '5.6.0', '7.0.0', false],
        ];
    }
}
