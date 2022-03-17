<?php


namespace Vonq\Account\Application\Command;


use Vonq\Account\Domain\AccountRepository;
use Vonq\Account\Domain\User;
use Vonq\Account\Domain\UserRepository;
use Vonq\Shared\Domain\Bus\CommandHandler;
use Vonq\Shared\Domain\UuidGenerator;

class CreateUserCommandHandler implements CommandHandler
{
    /**
     * CreateUserCommandHandler constructor.
     * @param UuidGenerator $uuidGenerator
     * @param AccountRepository $accountRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        private UuidGenerator $uuidGenerator,
        private AccountRepository $accountRepository,
        private UserRepository $userRepository
    ) {
    }

    public function __invoke(CreateUserCommand $command)
    {
        $account = $this->accountRepository->find($command->accountId);

        if($account === null) {
            throw new \Exception('Account not found');
        }

//        Todo: Before creating a new user, make sure that the email does not exist
//        $user = $this->userRepository->findByEmail($command->email);
//
//        if($user !== null) {
//            throw new \Exception("The user already exists");
//        }

//        Todo: Hashing should be done here.
//        $hash = $this->passwordHasher->hash($command->password);

        // Todo: Move this to a instance builder/factory
        $user = new User(
            $this->uuidGenerator->generate(),
            $account,
            $command->email,
            $command->password, // $hash
            $command->firstName,
            $command->lastName
        );

        $this->userRepository->persist($user);

        // Todo: Could be nice to trigger an event (e.g. UserCreatedEvent).
        // From there we could trigger SendEmailConfirmationMailCommand etc.

        // $this->eventDispatcher->dispatch(new UserCreatedEvent)
    }
}
