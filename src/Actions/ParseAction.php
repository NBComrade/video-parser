<?php

namespace App\Actions;

use App\Domain\Parsers\Factory\ParserFactory;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ParseAction extends Action
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args = [])
    {
        try {
            $url = $request->getParsedBody()['url'] ?? null;

            if (!$this->validateUrl($url)) {
                throw new InvalidArgumentException('Got invalid url');
            }

            /** @var $factory ParserFactory */
            $factory = $this->container->get('parserFactory');

            //@todo Here will be logic for resolving parser by url (YouTube, RuTube, else)

            $parser = $factory->createYouTubeParser();
            $jsonData = $parser->parse($url);

            return $response->withJson($jsonData);
        } catch (\Throwable $e) {
            $data['message'] = $e->getMessage();
            return $response->withJson($data, 400);
        }
    }

    protected function validateUrl(string $url): bool
    {
        return (bool)preg_match(YOUTUBE_REGEXP, $url, $matches);
    }
}
