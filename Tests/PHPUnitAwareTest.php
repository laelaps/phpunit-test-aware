<?php

namespace Laelaps\PHPUnit\TestAware\Tests;

use Laelaps\PHPUnit\TestAware\PHPUnitAware;
use PHPUnit_Framework_TestCase;

class PHPUnitAwareTest extends PHPUnit_Framework_TestCase
{
    public function testThatPHPUnitAwareTraitMatchesInterface()
    {
        // instanciating this class without errors is enough
        new PHPUnitAware;
    }
}
