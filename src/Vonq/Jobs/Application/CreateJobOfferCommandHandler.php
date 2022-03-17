<?php


namespace Vonq\Jobs\Application;


use Vonq\Jobs\Domain\JobOffer;
use Vonq\Jobs\Domain\JobOfferDescription;
use Vonq\Jobs\Domain\JobOfferId;
use Vonq\Jobs\Domain\JobOfferRepository;
use Vonq\Jobs\Domain\JobOfferTitle;
use Vonq\Shared\Domain\Bus\CommandHandler;

class CreateJobOfferCommandHandler implements CommandHandler
{
    /**
     * @var JobOfferRepository
     */
    private JobOfferRepository $jobOfferRepository;


    /**
     * CreateJobOfferCommandHandler constructor.
     * @param JobOfferRepository $jobOfferRepository
     */
    public function __construct(JobOfferRepository $jobOfferRepository)
    {
        $this->jobOfferRepository = $jobOfferRepository;
    }

    public function __invoke(CreateJobOfferCommand $command): void
    {
        $jobOffer = new JobOffer(
            new JobOfferId($command->id),
            new JobOfferTitle($command->title),
            new JobOfferDescription($command->description),
            null
        );

        $this->jobOfferRepository->persist($jobOffer);
    }
}
