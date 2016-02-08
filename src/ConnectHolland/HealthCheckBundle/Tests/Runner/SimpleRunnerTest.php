<?php

namespace ConnectHolland\HealthCheckBundle\Health\Runner;

use ConnectHolland\HealthCheckBundle\Health\Assertion\AssertionInterface;
use ConnectHolland\HealthCheckBundle\Health\Loader\LoaderInterface;
use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;
use ConnectHolland\HealthCheckBundle\Health\Test\ResultInterface;
use ConnectHolland\HealthCheckBundle\Health\Test\TestInterface;
use Mockery;
use PHPUnit_Framework_TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;


/**
 * Base implementation of a Runner
 *
 * @author Ron Rademaker
 */
class SimpleRunnerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the constructor
     */
    public function testConstructor()
    {
        $loaderMock = Mockery::mock(LoaderInterface::class);
        $eventDispatcherMock = Mockery::mock(EventDispatcher::class);

        $runner = new SimpleRunner($loaderMock, $eventDispatcherMock);

        $this->assertAttributeEquals($loaderMock, 'loader', $runner);
        $this->assertAttributeEquals($eventDispatcherMock, 'eventDispatcher', $runner);
    }

    /**
     * Test running the tests
     */
    public function testRun()
    {
        $mockSuites = [
            Mockery::mock(SuiteInterface::class)->shouldIgnoreMissing(),
            Mockery::mock(SuiteInterface::class)->shouldIgnoreMissing(),
            Mockery::mock(SuiteInterface::class)->shouldIgnoreMissing(),
        ];

        $loaderMock = Mockery::mock(LoaderInterface::class);
        $loaderMock->shouldReceive('loadSuites')->andReturn($mockSuites);
        $eventDispatcherMock = Mockery::mock(EventDispatcher::class)->shouldIgnoreMissing();

        $runner = new SimpleRunner($loaderMock, $eventDispatcherMock);
        $runner->run();

        foreach ($mockSuites as $mockSuite) {
            $mockSuite->shouldHaveReceived('run')->once();
        }

        $eventDispatcherMock->shouldHaveReceived('dispatch')->times(6);
    }

    /**
     * Test running an individual test
     *
     * @dataProvider provideTestTests
     */
    public function testRunTest(TestInterface $test, $expected)
    {
        $loaderMock = Mockery::mock(LoaderInterface::class);
        $eventDispatcherMock = Mockery::mock(EventDispatcher::class)->shouldIgnoreMissing();

        $runner = new SimpleRunner($loaderMock, $eventDispatcherMock);
        $result = $runner->runTest($test);

        $this->assertEquals($expected, $result->get());
        $assertions = $test->getAssertions();
        $eventDispatcherMock->shouldHaveReceived('dispatch')->times(3 + count($assertions));
    }

    /**
     * Gets tests to test with
     *
     * @return array
     */
    public function provideTestTests()
    {
        $successTest = Mockery::mock(TestInterface::class);
        $successAssertion = Mockery::mock(AssertionInterface::class);
        $successAssertion->shouldReceive('isFailed')->andReturn(false);
        $successTest->shouldReceive('getAssertions')->andReturn([$successAssertion]);
        $successTest->shouldIgnoreMissing();

        $failTest = Mockery::mock(TestInterface::class);
        $failAssertion = Mockery::mock(AssertionInterface::class);
        $failAssertion->shouldReceive('isFailed')->andReturn(true);
        $failTest->shouldReceive('getAssertions')->andReturn([$failAssertion]);
        $failTest->shouldIgnoreMissing();

        return [
            [
                $successTest,
                ResultInterface::SUCCESS
            ],
            [
                $failTest,
                ResultInterface::FAILURE
            ]
        ];
    }
}
