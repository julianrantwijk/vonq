<?php


namespace Vonq\Channel\Infrastructure\Persistence\Doctrine;


use Vonq\Channel\Domain\Channel;
use Vonq\Channel\Domain\ChannelCollection;
use Vonq\Channel\Domain\ChannelId;
use Vonq\Channel\Domain\ChannelRepository;
use Vonq\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

/**
 * Class DoctrineChannelRepository
 * @package Vonq\Channel\Infrastructure\Persistence\Doctrine
 */
class DoctrineChannelRepository extends DoctrineRepository implements ChannelRepository
{
    /**
     * @param string $id
     * @return Channel|null
     */
    public function find(string $id): ?Channel
    {
        $this->repository(Channel::class)->find($id);
    }

    /**
     * @return ChannelCollection
     */
    public function findAll(): ChannelCollection
    {
        $this->repository(Channel::class)->findAll();
    }
}
