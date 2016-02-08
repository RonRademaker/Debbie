<?php

namespace ConnectHolland\HealthCheckBundle\Health\Assertion;

/**
 * Abstract assertion for basic comparison checks
 *
 * @author Ron Rademaker
 */
abstract class AbstractComparison extends AbstractAssertion
{
    /**
     * The left part of the comparison
     *
     * @var mixed
     */
    private $left;

    /**
     * The right part of the comparisaon
     *
     * @var mixed
     */
    private $right;

    /**
     * Creates a new assertion
     *
     * @param mixed $left
     * @param mixed $right
     */
    public function __construct($left, $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * Returns if the terms of the assertion are met
     */
    public function assert()
    {
        $result = $this->compare($this->left, $this->right);

        if ($result === true) {
            $this->succeed();
        } else {
            $this->fail();
        }
    }

    /**
     * Compare two values
     *
     * @param mixed $left
     * @param mixed $right
     * @return bool
     */
    abstract protected function compare($left, $right);
}
