<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Assertion to check if a value is less than or equal to another
 *
 * @author Ron Rademaker
 */
class LessThanOrEqual extends AbstractComparison
{
    /**
     * Returns if left is less than or equal to right
     *
     * @param mixed $left
     * @param mixed $right
     * @return bool
     */
    protected function compare($left, $right)
    {
        return $left <= $right;
    }
}
