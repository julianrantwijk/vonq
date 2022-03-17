<?php


namespace Vonq\Channel\Domain;


use Vonq\Jobs\Domain\JobOffer;

interface JobGateway
{
    public function post(JobOffer $jobOffer): JobGatewayResponse;
}
