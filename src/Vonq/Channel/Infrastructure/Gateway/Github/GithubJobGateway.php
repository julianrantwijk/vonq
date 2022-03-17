<?php


namespace Vonq\Channel\Infrastructure\Gateway\Github;


use Vonq\Channel\Domain\JobGateway;
use Vonq\Channel\Domain\JobGatewayResponse;
use Vonq\Jobs\Domain\JobOffer;
use Vonq\Shared\Domain\Excception\NotImplementedException;

class GithubJobGateway implements JobGateway
{
    public function post(JobOffer $jobOffer): JobGatewayResponse
    {
        // Use a HTTP client or CURL to communicate with the Github API.
        throw new NotImplementedException();
    }
}
