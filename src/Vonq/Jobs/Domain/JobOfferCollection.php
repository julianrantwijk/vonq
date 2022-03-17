<?php


namespace Vonq\Jobs\Domain;


use Vonq\Shared\Domain\Collection;

/**
 * Class JobOfferCollection
 * @package Vonq\Jobs\Domain
 */
final class JobOfferCollection extends Collection
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return JobOffer::class;
    }
}
