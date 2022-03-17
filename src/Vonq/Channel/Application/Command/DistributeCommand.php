<?php


namespace Vonq\Channel\Application\Command;


use Vonq\Shared\Domain\Bus\Command;

class DistributeCommand implements Command
{

    /**
     * DistributeCommand constructor.
     */
    public function __construct(
        public string $channelId,
        public string $jobOfferId,
    ) {
    }
}
