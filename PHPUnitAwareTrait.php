<?php

namespace Laelaps\PHPUnit\TestAware;

use BadMethodCallException;
use PHPUnit_Framework_TestCase;

trait PHPUnitAwareTrait
{
    /**
     * @var \PHPUnit_Framework_TestCase
     */
    private $phpunit;

    /**
     * @return \PHPUnit_Framework_TestCase $phpunit
     * @throws \BadMethodCallException If PHPUnit is not set
     */
    public function getPHPUnit()
    {
        if (!($this->phpunit instanceof PHPUnit_Framework_TestCase)) {
            throw new BadMethodCallException('PHPUnit Test Case is not set.');
        }

        return $this->phpunit;
    }

    /**
     * @param \PHPUnit_Framework_TestCase $phpunit
     * @return void
     */
    public function setPHPUnit(PHPUnit_Framework_TestCase $phpunit = null)
    {
        $this->phpunit = $phpunit;
    }
}
