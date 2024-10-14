<?php

namespace Psr14EventDispatcher;

interface EventDispatcherInterface
{
    public function dispatch(EventInterface $event): void;
    public function addListener(string $eventName, callable $listener): void;
    public function removeListener(string $eventName, callable $listener): void;
}
