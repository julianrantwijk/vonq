<?php


namespace Vonq\Account\Domain;


use Vonq\Shared\Domain\AggregateRoot;
use Vonq\Shared\Domain\Arrayable;

/**
 *
 */
class Account extends AggregateRoot implements Arrayable, \JsonSerializable
{
    /**
     * @var string
     */
    private string $id;

    /**
     * Account constructor.
     * @param string $id
     */
    public function __construct(
        string $id
    ) {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
