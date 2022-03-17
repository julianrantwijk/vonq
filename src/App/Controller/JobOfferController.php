<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vonq\Shared\Domain\Bus\CommandBus;
use Vonq\Shared\Domain\Bus\QueryBus;

class JobOfferController extends AbstractController
{
    public function __construct(private CommandBus $commandBus, private QueryBus $queryBus)
    {
    }

    #[Route('/job/offer', name: 'app_job_offer')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/App/Controller/JobOfferController.php',
        ]);
    }
}
