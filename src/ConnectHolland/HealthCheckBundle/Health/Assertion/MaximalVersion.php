<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Comparison assertion to check for a max. version
 *
 * @author Ron Rademaker
 */
class MaximalVersion extends AbstractComparison
{
    /**
     * Returns if $left is at most $right
     *
     * @param mixed $left
     * @param mixed $right
     */
    protected function compare($left, $right)
    {
        return version_compare($left, $right) <= 0;
    }
}
