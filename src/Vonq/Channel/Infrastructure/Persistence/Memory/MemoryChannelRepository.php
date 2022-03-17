<?php

namespace Vonq\Channel\Infrastructure\Persistence\Memory;

use Vonq\Channel\Domain\Channel;
use Vonq\Channel\Domain\ChannelCollection;
use Vonq\Channel\Domain\ChannelRepository;

/**
 *
 */
class MemoryChannelRepository implements ChannelRepository
{
    /**
     * @var \string[][]
     */
    private $channels = [
        'indeed' => ['name' => 'Indeed'],
        'github' => ['name' => 'Github'],
    ];

    /**
     * @param string $id
     * @return Channel|null
     */
    public function find(string $id): ?Channel
    {
        if(!isset($this->channels[$id])) {
            return null;
        }

        $fields = $this->channels[$id];

        return new Channel($id, $fields['name']);
    }

    /**
     * @return ChannelCollection
     */
    public function findAll(): ChannelCollection
    {
        $records = [];

        foreach($this->channels as $id => $fields) {
            $records[] = new Channel($id, $fields['name']);
        }

        return new ChannelCollection($records);
    }
}
