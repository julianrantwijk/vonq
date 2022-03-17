<?php

namespace Vonq\Account\Application\Query;

use Vonq\Account\Domain\AccountRepository;
use Vonq\Shared\Domain\Bus\QueryHandler;

class GetAllAccountsQueryHandler implements QueryHandler
{
    public function __construct(
        private AccountRepository $accountRepository
    ) {
    }

    public function __invoke(GetAllAccountsQuery $query)
    {
        return $this->accountRepository->findAll();
    }
}
