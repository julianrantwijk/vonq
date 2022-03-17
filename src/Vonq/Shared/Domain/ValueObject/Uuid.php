<?php


namespace Vonq\Shared\Domain\ValueObject;


class Uuid
{
    private string $value;

    /**
     * Uuid constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function equals(Uuid $other): bool
    {
        return $other->getValue() === $this->getValue();
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}
