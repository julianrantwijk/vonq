<?php

namespace Vonq\Account\Application\Query;

class GetAllUsersFromAccountQuery
{
    public function __construct(
        public string $accountId
    ) {
    }
}
