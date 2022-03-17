<?php


namespace Vonq\Channel\Domain;


use Vonq\Shared\Domain\Collection;

/**
 * Class ChannelCollection
 * @package Vonq\Channel\Domain
 */
class ChannelCollection extends Collection
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return Channel::class;
    }
}
