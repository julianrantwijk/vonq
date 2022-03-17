<?php


namespace Vonq\Account\Application\Command;


use Vonq\Account\Domain\Account;
use Vonq\Account\Domain\AccountRepository;
use Vonq\Account\Domain\User;
use Vonq\Account\Domain\UserRepository;
use Vonq\Shared\Domain\Bus\CommandBus;
use Vonq\Shared\Domain\Bus\CommandHandler;
use Vonq\Shared\Domain\UuidGenerator;

class CreateAccountCommandHandler implements CommandHandler
{
    /**
     * CreateAccountCommandHandler constructor.
     * @param UuidGenerator $uuidGenerator
     * @param AccountRepository $accountRepository
     */
    public function __construct(
        private UuidGenerator $uuidGenerator,
        private AccountRepository $accountRepository,
        private CommandBus $commandBus,
    ) {
    }

    public function __invoke(CreateAccountCommand $command)
    {
        $account = new Account(
            $this->uuidGenerator->generate()
        );

        $this->accountRepository->persist($account);

        $this->commandBus->dispatch(new CreateUserCommand(
            $account->getId(),
            $command->email,
            $command->password,
            $command->firstName,
            $command->lastName
        ));
    }
}
