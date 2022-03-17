<?php


namespace Vonq\Jobs\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Vonq\Jobs\Domain\JobOffer;
use Vonq\Jobs\Domain\JobOfferRepository;
use Vonq\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

/**
 * Class DoctrineJobOfferRepository
 * @package Vonq\Jobs\Infrastructure\Persistence\Doctrine
 */
class DoctrineJobOfferRepository extends DoctrineRepository implements JobOfferRepository
{
    /**
     * @param string $id
     * @return JobOffer|null
     */
    public function find(string $id): ?JobOffer
    {
        $result = $this->repository(JobOffer::class)->find($id);

        if ($result === null) {
            return null;
        }

        return new JobOffer(
            $result->id,
            $result->title,
            $result->type,
            $result->description
        );
    }

    /**
     * @param JobOffer $entity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function persist(JobOffer $entity): void
    {
        $this->persistEntity($entity);
    }

    /**
     * @param JobOffer $entity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(JobOffer $entity): void
    {
        $this->removeEntity($entity);
    }
}
