<?php

namespace Vonq\Account\Domain;

use Vonq\Shared\Domain\Collection;

class AccountCollection extends Collection
{
    public function getType(): string
    {
        return Account::class;
    }
}
