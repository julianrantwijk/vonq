<?php


namespace Vonq\Account\Infrastructure\Persistence\Doctrine;


use Vonq\Account\Domain\Account;
use Vonq\Account\Domain\AccountCollection;
use Vonq\Account\Domain\AccountRepository;
use Vonq\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

/**
 *
 */
final class DoctrineAccountRepository extends DoctrineRepository implements AccountRepository
{
    /**
     * @param string $id
     * @return Account|null
     */
    public function find(string $id): ?Account
    {
        /** @var Account|null $result */
        $result = $this->repository(Account::class)->find($id);

        if ($result === null) {
            return null;
        }

        return $result;
    }

    /**
     * @return AccountCollection
     */
    public function findAll(): AccountCollection
    {
        /** @var Account[] $results */
        $results = $this->repository(Account::class)->findAll();

        return new AccountCollection($results);
    }

    /**
     * @param Account $account
     * @return void
     */
    public function persist(Account $account): void
    {
        $this->persistEntity($account);
    }
}
