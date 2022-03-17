<?php


namespace Vonq\Shared\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Vonq\Shared\Domain\AggregateRoot;

/**
 * Class DoctrineRepository
 * @package Vonq\Shared\Infrastructure\Persistence\Doctrine
 */
abstract class DoctrineRepository
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * DoctrineRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param AggregateRoot $entity
     */
    protected function persistEntity(AggregateRoot $entity): void
    {
        $this->entityManager()->persist($entity);
        $this->entityManager()->flush($entity);
    }

    /**
     * @return EntityManagerInterface
     */
    protected function entityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @param AggregateRoot $entity
     */
    protected function removeEntity(AggregateRoot $entity): void
    {
        $this->entityManager()->remove($entity);
        $this->entityManager()->flush($entity);
    }

    /**
     * @param string $entityClass
     * @return EntityRepository
     */
    protected function repository(string $entityClass): EntityRepository
    {
        return $this->entityManager->getRepository($entityClass);
    }
}
