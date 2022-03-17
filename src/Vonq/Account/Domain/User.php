<?php


namespace Vonq\Account\Domain;


use JetBrains\PhpStorm\Internal\TentativeType;
use Vonq\Shared\Domain\AggregateRoot;
use Vonq\Shared\Domain\Arrayable;

/**
 *
 */
class User extends AggregateRoot implements \JsonSerializable, Arrayable
{
    /**
     * User constructor.
     * @param string $id
     * @param Account $account
     * @param string $email
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        private string $id,
        private Account $account,
        private string $email,
        private string $password,
        private string $firstName,
        private string $lastName
    ) {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Hashing is an implementation detail and has no place in a domain model.
     * The fact that the password is a hash is irrelevant.
     *
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account): void
    {
        $this->account = $account;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'full_name' => $this->getFullName(),
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
