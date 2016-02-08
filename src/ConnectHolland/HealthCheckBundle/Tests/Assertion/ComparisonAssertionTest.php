<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

use PHPUnit_Framework_TestCase;

/**
 * Unit test to test the comparison assertions
 * Combining multiple in one class because they're very similar
 *
 * @author Ron Rademaker
 */
class ComparisonAssertionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests an assertion
     *
     * @dataProvider provideTestAssertions
     *
     * @param AbstractComparison $assertion
     * @param bool $success
     */
    public function testAssertion(AbstractComparison $assertion, $success)
    {
        $this->assertFalse($assertion->isExecuted());

        $assertion->assert();

        $this->assertTrue($assertion->isExecuted());
        $this->assertEquals(!$success, $assertion->isFailed());
    }

    /**
     * Gets assertions and expected results
     *
     * @return array
     */
    public function provideTestAssertions()
    {
        return [
            [new Equals('foo', 'foo'), true],
            [new Equals('foo', 'foobar'), false],
            [new Equals('1', 1), false],
            [new LooseEquals('foo', 'foo'), true],
            [new LooseEquals('foo', 'foobar'), false],
            [new LooseEquals('1', 1), true],
            [new GreaterThan(10, 5), true],
            [new GreaterThan(5, 5), false],
            [new GreaterThan(5, 10), false],
            [new GreaterThanOrEqual(10, 5), true],
            [new GreaterThanOrEqual(5, 5), true],
            [new GreaterThanOrEqual(5, 10), false],
            [new LessThan(10, 5), false],
            [new LessThan(5, 5), false],
            [new LessThan(5, 10), true],
            [new LessThanOrEqual(10, 5), false],
            [new LessThanOrEqual(5, 5), true],
            [new LessThanOrEqual(5, 10), true],
            [new MaximalVersion('4.0.0', '5.0.0'), true],
            [new MaximalVersion('4.0.1', '4.0.1'), true],
            [new MaximalVersion('4.1.1', '4.0.1'), false],
            [new MinimalVersion('4.0.0', '5.0.0'), false],
            [new MinimalVersion('4.0.1', '4.0.1'), true],
            [new MinimalVersion('4.1.1', '4.0.1'), true],
        ];
    }
}
