<?php

namespace Psr14EventDispatcher;

class ListenerProvider implements ListenerProviderInterface
{
    private array $listeners = [];

    public function addListener(string $eventName, callable $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function getListenersForEvent(EventInterface $event): iterable
    {
        return $this->listeners[$event->getName()] ?? [];
    }
}
