<?php

/** @var \Slim\App $app */

//container services configuration

$container = $app->getContainer();

$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer(constant('TEMPLATES_PATH'));
};

$container['client'] = function ($container) {
    return new \GuzzleHttp\Client;
};

$container['parserFactory'] = function ($container) {
    return new App\Domain\Parsers\Factory\ParserFactory;
};
