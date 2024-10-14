<?php

namespace Psr14EventDispatcher;

interface ListenerProviderInterface
{
    public function getListenersForEvent(EventInterface $event): iterable;
}
