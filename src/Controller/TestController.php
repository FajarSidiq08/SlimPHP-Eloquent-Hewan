<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class TestController
{
    public function index(Request $request, Response $response, $args): Response
    {
        $view = Twig::fromRequest($request);

        // render file tes.twig
        return $view->render($response, 'tes.twig');
    }
}
