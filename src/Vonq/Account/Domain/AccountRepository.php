<?php


namespace Vonq\Account\Domain;


interface AccountRepository
{
    public function find(string $id): ?Account;

    public function findAll(): AccountCollection;

    public function persist(Account $account): void;
}
