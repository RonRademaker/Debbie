<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Assertion to check if a value is greater than another
 *
 * @author Ron Rademaker
 */
class GreaterThan extends AbstractComparison
{
    /**
     * Returns if left is greater than right
     *
     * @param mixed $left
     * @param mixed $right
     * @return bool
     */
    protected function compare($left, $right)
    {
        return $left > $right;
    }
}
