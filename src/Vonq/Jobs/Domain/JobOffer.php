<?php


namespace Vonq\Jobs\Domain;


use Vonq\Shared\Domain\AggregateRoot;

class JobOffer extends AggregateRoot
{
    const TYPE_FULL_TIME = 'full_time';
    const TYPE_PART_TIME = 'part_time';

    const TYPES = [
        self::TYPE_FULL_TIME,
        self::TYPE_PART_TIME
    ];

    private string $id;
    private string $title;
    private string $type;
    private string $description;

    /**
     * JobOffer constructor.
     * @param string $id
     * @param string $title
     * @param string $type
     * @param string $description
     */
    public function __construct(
        string $id,
        string $title,
        string $type,
        string $description
    ) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setType($type);
        $this->setDescription($description);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
