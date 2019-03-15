<?php

namespace App\Domain\Parsers\Factory;

use App\Domain\Interfaces\ParserInterface;
use App\Domain\Parsers\RuTubeParser;
use App\Domain\Parsers\YouTubeParser;
use GuzzleHttp\Client;

class ParserFactory
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function createYouTubeParser(): ParserInterface
    {
        return new YouTubeParser($this->client);
    }

    public function createRuTubeParser(): ParserInterface
    {
        return new RuTubeParser($this->client);
    }
}
