<?php


namespace Vonq\Account\Infrastructure\Persistence\Doctrine;


use Vonq\Account\Domain\User;
use Vonq\Account\Domain\UserCollection;
use Vonq\Account\Domain\UserRepository;
use Vonq\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

/**
 *
 */
final class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    /**
     * @param string $id
     * @return User|null
     */
    public function find(string $id): ?User
    {
        /** @var User|null $result */
        $user = $this->repository(User::class)->find($id);

        if ($user === null) {
            return null;
        }

        return $user;
    }

    /**
     * @param string $accountId
     * @return UserCollection
     */
    public function findAllFromAccount(string $accountId): UserCollection
    {
        $results = $this->repository(User::class)->findBy([
            'account_id' => $accountId
        ]);

        return new UserCollection($results);
    }

    /**
     * This method is a bit ugly... We are unable to
     * use persistEntity directly because PHP doesn't allow
     * to overwrite parameter types.
     *
     * @param User $user
     * @return void
     */
    public function persist(User $user): void
    {
        $this->persistEntity($user);
    }
}
