<?php


namespace Vonq\Shared\Domain;


/**
 * Interface Arrayable
 * @package Vonq\Shared\Domain
 */
interface Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array;
}
