<?php


namespace Vonq\Account\Domain;


interface UserRepository
{
    public function find(string $id): ?User;

    public function findAllFromAccount(string $accountId): UserCollection;

    public function persist(User $user): void;
}
