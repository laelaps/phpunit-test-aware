<?php

namespace Laelaps\PHPUnit\TestAware\Fixture;

use Laelaps\PHPUnit\TestAware\PHPUnitAware;
use PHPUnit_Framework_TestCase;
use SplObjectStorage;
use SplObserver as SplObserverInterface;
use SplSubject;

class SplObserver extends PHPUnitAware implements SplObserverInterface
{
    /**
     * @var \SplSubject
     */
    private $expectedUpdateOnce;

    /**
     * @var \SplObjectStorage
     */
    private $notifications;

    public function __construct(PHPUnit_Framework_TestCase $phpunit)
    {
        $this->notifications = new SplObjectStorage;
        $this->setPHPUnit($phpunit);
    }

    /**
     * @param \SplSubject $subject
     * @return void
     */
    public function assertIsNotifiedBy(SplSubject $subject)
    {
        $failureExplanation = sprintf('"%s" is expected to be notified by "%s"', get_class($this), get_class($subject));
        $this->getPHPUnit()->assertTrue($this->isNotifiedBy($subject), $failureExplanation);
    }

    /**
     * @param \SplSubject $subject
     * @return void
     */
    public function assertIsNotNotifiedBy(SplSubject $subject)
    {
        $failureExplanation = sprintf('"%s" is expected to be notified by "%s"', get_class($this), get_class($subject));
        $this->getPHPUnit()->assertFalse($this->isNotifiedBy($subject), $failureExplanation);
    }

    /**
     * @param \SplSubject $subject
     * @return bool
     */
    public function isNotifiedBy(SplSubject $subject)
    {
        return $this->notifications->contains($subject);
    }

    /**
     * @param \SplSubject $subject
     * @return void
     */
    public function setExpectedUpdateOnce(SplSubject $subject = null)
    {
        $this->expectedUpdateOnce = $subject;
    }

    /**
     * @param \SplSubject $subject
     * @return void
     */
    public function update(SplSubject $subject)
    {
        $this->notifications->attach($subject);
    }
}
