<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vonq\Channel\Application\Command\DistributeCommand;
use Vonq\Channel\Application\Query\GetAllChannelsQuery;
use Vonq\Shared\Domain\Bus\CommandBus;
use Vonq\Shared\Domain\Bus\QueryBus;

class ChannelController extends AbstractController
{
    public function __construct(private CommandBus $commandBus, private QueryBus $queryBus)
    {
    }

    #[Route('/channel', name: 'channel', methods: 'GET')]
    public function index(): Response
    {
        $channels = $this->queryBus->ask(new GetAllChannelsQuery());

        return $this->json([
            'message' => 'Index',
            'channels' => $channels,
        ]);
    }

    #[Route('/channel/publish', name: 'channel_publish', methods: 'POST')]
    public function publish(Request $request): Response
    {
        $this->commandBus->dispatch(new DistributeCommand(
            $request->get('channel_id'),
            $request->get('job_offer_id')
        ));

        return $this->json([
            'message' => 'Published',
        ]);
    }
}
