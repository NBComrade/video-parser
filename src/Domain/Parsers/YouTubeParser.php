<?php

namespace App\Domain\Parsers;

use App\Domain\Interfaces\ParserInterface;
use GuzzleHttp\Client;

class YouTubeParser implements ParserInterface
{
    private $url;
    private $videoId;

    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string|null $url
     * @return string
     */
    public function parse(?string $url): string
    {
        $this->url = $url;
        $this->resolveVideoIdByUrl();
        return $this->makeRequest();
    }

    private function makeRequest(): string
    {
        try {
            $response = $this->client->get($this->prepareRequestUrl());
            return $response->getBody()->getContents();
        } catch (\Throwable $e) {
            throw new \DomainException('Bad request form video host');
        }
    }

    private function resolveVideoIdByUrl(): void
    {
        parse_str(parse_url($this->url, PHP_URL_QUERY), $vars);
        $this->videoId = $vars['v'];
    }

    private function prepareRequestUrl(): string
    {
        return 'http://www.youtube.com/oembed?url=http%3A//youtube.com/watch%3Fv%3D' .
            $this->videoId . '&format=json';
    }
}
