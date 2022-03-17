<?php


namespace Vonq\Shared\Domain;

use Traversable;

/**
 * Class Collection
 * @package Vonq\Shared\Domain
 */
abstract class Collection implements Arrayable, \Countable, \IteratorAggregate, \JsonSerializable
{
    /**
     * @var array
     */
    private array $items;

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        Assert::arrayOf($this->getType(), $items);

        $this->items = $items;
    }

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->toArray());
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->toArray());
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
