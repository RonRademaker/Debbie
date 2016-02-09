<?php

namespace ConnectHolland\HealthCheckBundle\Controller;

use ConnectHolland\HealthCheckBundle\Health\Controller\ControllerInterface;
use ConnectHolland\HealthCheckBundle\Health\Runner\RunnerInterface;
use ConnectHolland\HealthCheckBundle\Health\Suite\SuiteInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

/**
 * Controller to perform the health checks
 *
 * @author Ron Rademaker
 */
class HealthCheckController implements ControllerInterface
{
    /**
     * Health check runner
     *
     * @var RunnerInterface
     */
    private $runner;

    /**
     * Templating engine
     *
     * @var EngineInterface
     */
    private $templating;


    /**
     * Array of tested $suites
     *
     * @var array
     */
    private $suites;

    /**
     * Creates a new HealthCheckController
     *
     * @param RunnerInterface $runner
     */
    public function __construct(RunnerInterface $runner, EngineInterface $templating)
    {
        $this->runner = $runner;
        $this->templating = $templating;
        $this->suites = [];
    }

    /**
     * Performs health checks and returns Response container results
     *
     * @return Response
     */
    public function healthAction()
    {
        $this->runner->run();
        $result = $this->getResults();
        return new Response(
            $this->templating->render(
                'ConnectHollandHealthCheckBundle:health.html.twig',
                ['result' => $result]
            )
        );
    }

    /**
     * Registers a completed suite
     *
     * @param SuiteInterface $suite
     */
    public function registerSuiteResult(SuiteInterface $suite)
    {
        $this->suites[] = $suite;
    }

    /**
     * Rewrite the suites into a result array
     *
     * @return array
     */
    private function getResults()
    {
        $result = [];
        foreach ($this->suites as $suite) {
            $fqCls = get_class($suite);
            $suiteName = substr($fqCls, strrpos($fqCls, '\\') + 1);
            $result[$suiteName] = [];

            $testResults = $suite->getResults();
            foreach ($testResults as $testResult) {
                $testCls = get_class($testResult->getTest());
                $testName = substr($testCls, strrpos($testCls, '\\') + 1);
                $result[$suiteName][] = ['test' => $testName, 'result' => $testResult->get()];
            }
        }

        return $result;
    }
}
