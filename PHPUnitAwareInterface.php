<?php

namespace Laelaps\PHPUnit\TestAware;

use PHPUnit_Framework_TestCase;

interface PHPUnitAwareInterface
{
    /**
     * @return \PHPUnit_Framework_TestCase $phpunit
     * @throws \BadMethodCallException If PHPUnit is not set
     */
    public function getPHPUnit();

    /**
     * @param \PHPUnit_Framework_TestCase $phpunit
     * @return void
     */
    public function setPHPUnit(PHPUnit_Framework_TestCase $phpunit = null);
}
