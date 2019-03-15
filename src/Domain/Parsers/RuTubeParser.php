<?php

namespace App\Domain\Parsers;

use App\Domain\Interfaces\ParserInterface;
use GuzzleHttp\Client;

class RuTubeParser implements ParserInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function parse(?string $url): array
    {
       //@todo Just stub. Add realization in the future
    }
}
