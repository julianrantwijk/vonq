<?php

namespace Vonq\Shared\Infrastructure;

use Vonq\Shared\Domain\UuidGenerator;
use Vonq\Shared\Domain\ValueObject\Uuid;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): Uuid
    {
        return new Uuid(\Ramsey\Uuid\Uuid::uuid4()->toString());
    }
}
