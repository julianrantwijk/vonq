<?php


namespace Vonq\Shared\Domain;


use Vonq\Shared\Domain\ValueObject\Uuid;

/**
 * Interface UuidGenerator
 * @package Vonq\Shared\Domain
 */
interface UuidGenerator
{
    /**
     * @return Uuid
     */
    public function generate(): Uuid;
}
