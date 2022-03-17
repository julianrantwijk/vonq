<?php


namespace Vonq\Jobs\Application;


use Vonq\Shared\Domain\Bus\Command;

class CreateJobOfferCommand implements Command
{
    public string $id;
    public string $title;
    public string $description;

    /**
     * CreateJobOfferCommandHandler constructor.
     * @param string $id
     * @param string $title
     * @param string $description
     */
    public function __construct(
        string $id,
        string $title,
        string $description
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }
}
