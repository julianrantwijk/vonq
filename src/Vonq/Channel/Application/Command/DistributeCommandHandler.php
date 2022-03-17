<?php


namespace Vonq\Channel\Application\Command;


use Vonq\Channel\Domain\ChannelRepository;
use Vonq\Channel\Domain\JobGatewayBuilder;
use Vonq\Jobs\Domain\JobOfferRepository;
use Vonq\Shared\Domain\Bus\CommandHandler;

/**
 *
 */
class DistributeCommandHandler implements CommandHandler
{
    /**
     * DistributeCommandHandler constructor.
     * @param JobGatewayBuilder $gatewayBuilder
     * @param JobOfferRepository $jobOfferRepository
     * @param ChannelRepository $channelRepository
     */
    public function __construct(
        private JobGatewayBuilder $gatewayBuilder,
        private JobOfferRepository $jobOfferRepository,
        private ChannelRepository $channelRepository
    ) {
    }

    /**
     * @param DistributeCommand $command
     * @return void
     * @throws \Exception
     */
    public function __invoke(DistributeCommand $command)
    {
        $channel = $this->channelRepository->find($command->channelId);

        if ($channel === null) {
            // Todo: Use more specific errors (aka: ChannelNotFoundException)
            throw new \Exception('Invalid channel');
        }

        $jobOffer = $this->jobOfferRepository->find($command->jobOfferId);

        if ($jobOffer === null) {
            // Todo: Use more specific errors (aka: ChannelNotFoundException)
            throw new \Exception('Invalid job offer');
        }

        // Use the channel ID to resolve the gateway. This works with a simple
        // mapping for now and should be optimised in the future.
        $gateway = $this->gatewayBuilder->build($command->channelId);

        $gateway->post($jobOffer);
    }
}
