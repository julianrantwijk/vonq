<?php


namespace Vonq\Channel\Domain;


use Vonq\Shared\Domain\AggregateRoot;
use Vonq\Shared\Domain\Arrayable;

class Channel extends AggregateRoot implements Arrayable, \JsonSerializable
{
    private string $id;
    private string $name;


    /**
     * Channel constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct(
        string $id,
        string $name
    ) {
        $this->setId($id);
        $this->setName($name);
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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }

    public function jsonSerialize(): mixed
    {
        return $this->toArray();
    }
}
