<?php

namespace ConnectHolland\HealthCheckBundle\Health\Event;

/**
 * Class defining healthtest events
 *
 * @author Ron Rademaker
 */
final class HealthTestEvents
{
    /**
     * The TESTSUITE_STARTED event is dispatched for any testsuite that starts
     */
    const TESTSUITE_STARTED = 'healthtest.testsuite_started';

    /**
     * The TESTSUITE_ENDED event is dispatched for any testsuite that ends
     */
    const TESTSUITE_ENDED = 'healthtest.testsuite_ended';

     /**
     * The TEST_STARTED event is dispatched for any test that starts
     */
    const TEST_STARTED = 'healthtest.test_started';

    /**
     * The TEST_ENDED event is dispatched for any test that ends
     */
    const TEST_ENDED = 'healthtest.test_ended';

    /**
     * The TEST_FAILED event is dispatched if at least one assertion in the test failed
     */
    const TEST_FAILED = 'healthtest.test_failed';

    /**
     * The TEST_SUCCEEDED event is dispatched if all assertions succeeded
     */
    const TEST_SUCCEEDED = 'healthtest.test_succeeded';

    /**
     * The ASSERTION_FAILED event is dispatched for any assertion that fails
     */
    const ASSERTION_FAILED = 'healthtest.assertion_failed';

    /**
     * The ASSERTION_SUCCEEDED event is dispatched for any assertion that succeeds
     */
    const ASSERTION_SUCCEEDED = 'healthtest.assertion_succeeded';
}
