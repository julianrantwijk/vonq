<?php


namespace Vonq\Channel\Domain;


/**
 * Interface ChannelRepository
 * @package Vonq\Channel\Domain
 */
interface ChannelRepository
{
    /**
     * @param string $id
     * @return Channel|null
     */
    public function find(string $id): ?Channel;

    /**
     * @return ChannelCollection
     */
    public function findAll(): ChannelCollection;
}
