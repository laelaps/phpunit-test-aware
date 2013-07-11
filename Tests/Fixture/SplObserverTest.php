<?php

namespace Laelaps\PHPUnit\TestAware\Tests\Fixture;

use Laelaps\PHPUnit\TestAware\Fixture\SplObserver;
use PHPUnit_Framework_TestCase;

class SplObserverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return \SplSubject
     */
    private function getSplSubject()
    {
        return $this->getMock('SplSubject');
    }

    public function testThatUpdateIsRecorded()
    {
        $observer = new SplObserver($this);
        $subject = $this->getSplSubject();

        $observer->assertIsNotNotifiedBy($subject);

        $observer->update($subject);

        $observer->assertIsNotifiedBy($subject);
    }
}
