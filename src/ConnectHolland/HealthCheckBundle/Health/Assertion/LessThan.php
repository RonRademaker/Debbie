<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Assertion to check if a value is less than another
 *
 * @author Ron Rademaker
 */
class LessThan extends AbstractComparison
{
    /**
     * Returns if left is less than right
     *
     * @param mixed $left
     * @param mixed $right
     * @return bool
     */
    protected function compare($left, $right)
    {
        return $left < $right;
    }
}
