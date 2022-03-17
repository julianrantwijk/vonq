<?php


namespace Vonq\Account\Application\Command;


use Vonq\Shared\Domain\Bus\Command;

class CreateAccountCommand implements Command
{
    /**
     * CreateAccountCommand constructor.
     *
     * @param string $email
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        public string $email,
        public string $password,
        public string $firstName,
        public string $lastName
    ) {
    }
}
