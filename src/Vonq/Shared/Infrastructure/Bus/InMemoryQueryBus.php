<?php


namespace Vonq\Shared\Infrastructure\Bus;


use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Vonq\Shared\Domain\Bus\Query;
use Vonq\Shared\Domain\Bus\QueryBus;

/**
 * Class InMemoryQueryBus
 * @package Vonq\Shared\Infrastructure\Bus
 */
class InMemoryQueryBus implements QueryBus
{
    use HandleTrait;

    /**
     * InMemoryCommandBus constructor.
     * @param MessageBusInterface $queryBus
     */
    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    /**
     * @param Query $query
     * @return mixed
     */
    public function ask(Query $query): mixed
    {
        return $this->handle($query);
    }
}
