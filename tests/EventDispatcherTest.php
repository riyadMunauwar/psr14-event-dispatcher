<?php

use Psr14EventDispatcher\Event;
use Psr14EventDispatcher\EventDispatcher;
use PHPUnit\Framework\TestCase;

class EventDispatcherTest extends TestCase
{
    public function testDispatchingAnEventCallsListener()
    {
        $eventDispatcher = new EventDispatcher();
        $event = new Event('test.event');

        $listenerCalled = false;

        $eventDispatcher->addListener('test.event', function() use (&$listenerCalled) {
            $listenerCalled = true;
        });

        $eventDispatcher->dispatch($event);

        $this->assertTrue($listenerCalled);
    }

    public function testRemovingListener()
    {
        $eventDispatcher = new EventDispatcher();
        $event = new Event('test.event');

        $listenerCalled = false;

        $listener = function() use (&$listenerCalled) {
            $listenerCalled = true;
        };

        $eventDispatcher->addListener('test.event', $listener);
        $eventDispatcher->removeListener('test.event', $listener);

        $eventDispatcher->dispatch($event);

        $this->assertFalse($listenerCalled);
    }
}
