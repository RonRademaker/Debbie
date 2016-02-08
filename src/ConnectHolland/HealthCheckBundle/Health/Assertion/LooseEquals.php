<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Assertion to check if two values are equal
 *
 * @author Ron Rademaker
 */
class LooseEquals extends AbstractComparison
{
    /**
     * Returns if left and right are equal (loose)
     *
     * @param mixed $left
     * @param mixed $right
     * @return bool
     */
    protected function compare($left, $right)
    {
        return $left == $right;
    }
}
