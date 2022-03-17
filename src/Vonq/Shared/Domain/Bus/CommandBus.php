<?php


namespace Vonq\Shared\Domain\Bus;


interface CommandBus
{
    public function dispatch(Command $command): void;
}
