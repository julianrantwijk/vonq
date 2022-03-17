<?php

namespace Vonq\Channel\Domain;

use Vonq\Channel\Infrastructure\Gateway\Github\GithubJobGateway;
use Vonq\Channel\Infrastructure\Gateway\Indeed\IndeedJobGateway;

class JobGatewayBuilder
{
    // This should be moved to a config file
    protected $mapping = [
        'github' => GithubJobGateway::class,
        'indeed' => IndeedJobGateway::class
    ];

    public function build(string $id): JobGateway
    {
        if (!in_array($id, $this->mapping)) {
            throw new \Exception("Unknown gateway");
        }

        $class = $this->mapping[$id];

        return new $class();
    }
}
