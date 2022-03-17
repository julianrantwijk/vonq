<?php

namespace Vonq\Shared\Domain\Bus;

interface QueryBus
{
    public function ask(Query $query): mixed;
}
