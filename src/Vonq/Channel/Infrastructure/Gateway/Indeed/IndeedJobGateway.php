<?php


namespace Vonq\Channel\Infrastructure\Gateway\Indeed;


use Vonq\Channel\Domain\JobGateway;
use Vonq\Channel\Domain\JobGatewayResponse;
use Vonq\Jobs\Domain\JobOffer;
use Vonq\Shared\Domain\Excception\NotImplementedException;

class IndeedJobGateway implements JobGateway
{
    public function post(JobOffer $jobOffer): JobGatewayResponse
    {
        // Use a HTTP client or CURL to communicate with the Github API.
        throw new NotImplementedException();
    }
}
