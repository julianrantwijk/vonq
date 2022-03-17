<?php

namespace Vonq\Account\Domain;

use Vonq\Shared\Domain\Collection;

class UserCollection extends Collection
{
    public function getType(): string
    {
        return User::class;
    }
}
