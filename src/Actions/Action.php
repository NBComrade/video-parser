<?php

namespace App\Actions;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

abstract class Action
{
    protected $container;
    /** @var PhpRenderer */
    protected $view;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $container->get('view');
    }

    abstract public function __invoke(RequestInterface $request, ResponseInterface $response, array $args = []);
}
