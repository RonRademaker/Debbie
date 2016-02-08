<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Comparison assertion to check for a min. version
 *
 * @author Ron Rademaker
 */
class MinimalVersion extends AbstractComparison
{
    /**
     * Returns if $left is at least $right
     *
     * @param mixed $left
     * @param mixed $right
     */
    protected function compare($left, $right)
    {
        return version_compare($left, $right) >= 0;
    }
}
