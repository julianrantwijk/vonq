<?php


namespace Vonq\Account\Application\Command;


use Vonq\Shared\Domain\Bus\Command;

class CreateUserCommand implements Command
{
    /**
     * CreateUserCommand constructor.
     * @param string $accountId
     * @param string $email
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        public string $accountId,
        public string $email,
        public string $password,
        public string $firstName,
        public string $lastName
    ) {
    }
}
