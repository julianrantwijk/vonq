<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vonq\Account\Application\Command\CreateAccountCommand;
use Vonq\Account\Application\Query\GetAllAccountsQuery;
use Vonq\Account\Domain\UserCollection;
use Vonq\Shared\Domain\Bus\CommandBus;
use Vonq\Shared\Domain\Bus\QueryBus;

class AccountController extends AbstractController
{
    public function __construct(private CommandBus $commandBus, private QueryBus $queryBus)
    {
    }

    #[Route('/account', name: 'account_index', methods: 'GET')]
    public function index(): Response
    {
        /** @var UserCollection $accounts */
        $accounts = $this->queryBus->ask(new GetAllAccountsQuery());

        return $this->json([
            'message' => 'List all accounts',
            'accounts' => $accounts->toArray()
        ]);
    }

    #[Route('/account', name: 'account_create', methods: 'POST')]
    public function create(Request $request): Response
    {
        $this->commandBus->dispatch(new CreateAccountCommand(
            $request->get('email'),
            $request->get('password'),
            $request->get('first_name'),
            $request->get('last_name')
        ));

        return $this->json([
            'message' => 'Created',
        ]);
    }
}
