<?php


namespace Vonq\Jobs\Domain;


interface JobOfferRepository
{
    public function find(string $id): ?JobOffer;

    public function persist(JobOffer $entity): void;

    public function remove(JobOffer $entity): void;
}
