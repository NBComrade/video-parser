<?php

namespace App\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class IndexAction extends Action
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args = [])
    {
        return $this->view->render($response, 'page.phtml');
    }
}
