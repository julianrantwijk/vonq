<?php

namespace Vonq\Channel\Application\Query;

use Vonq\Channel\Domain\ChannelRepository;
use Vonq\Shared\Domain\Bus\QueryHandler;

class GetAllChannelsQueryHandler implements QueryHandler
{
    public function __construct(private ChannelRepository $channelRepository)
    {
    }

    public function __invoke(GetAllChannelsQuery $query)
    {
        return $this->channelRepository->findAll();
    }
}
