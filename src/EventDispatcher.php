<?php

namespace Psr14EventDispatcher;

class EventDispatcher implements EventDispatcherInterface
{
    private array $listeners = [];

    public function dispatch(EventInterface $event): void
    {
        $eventName = $event->getName();
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        foreach ($this->listeners[$eventName] as $listener) {
            call_user_func($listener, $event);
        }
    }

    public function addListener(string $eventName, callable $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function removeListener(string $eventName, callable $listener): void
    {
        if (isset($this->listeners[$eventName])) {
            foreach ($this->listeners[$eventName] as $key => $existingListener) {
                if ($existingListener === $listener) {
                    unset($this->listeners[$eventName][$key]);
                }
            }
        }
    }
}
