<?php

namespace App\Controller;

use App\Model\User;
use Pimple\Psr11\Container;
use App\Helper\JsonResponse;
use App\Model\Hewan;
use App\Repository\UploadFile;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HewanController
{
  
    public function index(Request $request, Response $response): Response
    {
        $hewan = Hewan::all();

        $result['status'] = true;
        $result['data']   = $hewan;

        return JsonResponse::withJson($response, $result, 200);
    }
} 
