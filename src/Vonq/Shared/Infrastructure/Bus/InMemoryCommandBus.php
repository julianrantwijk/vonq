<?php


namespace Vonq\Shared\Infrastructure\Bus;


use Symfony\Component\Messenger\MessageBusInterface;
use Vonq\Shared\Domain\Bus\Command;
use Vonq\Shared\Domain\Bus\CommandBus;

/**
 * Class InMemoryCommandBus
 * @package Vonq\Shared\Infrastructure\Bus
 */
class InMemoryCommandBus implements CommandBus
{
    /**
     * @var MessageBusInterface
     */
    private MessageBusInterface $commandBus;

    /**
     * InMemoryCommandBus constructor.
     * @param MessageBusInterface $commandBus
     */
    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param Command $command
     */
    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
