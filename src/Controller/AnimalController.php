<?php

namespace App\Controller;

use App\Model\Animal;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class AnimalController
{
    public function index(Request $request, Response $response): Response
    {
        $animal = Animal::all();

        $result['status'] = true;
        $result['data']   = $animal;

        return JsonResponse::withJson($response, $result, 200);
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $animal = Animal::create($data);

        $result['status'] = true;
        $result['data']   = $animal;

        return JsonResponse::withJson($response, $result, 200);
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $animal = Animal::where('id', $args['id'])->first();
        if (!$animal) {
            $result = ['status' => false, 'error' => 'hewan tidak ditemukan'];
            return JsonResponse::withJson($response, $result, 404);
        }

        $data = $request->getParsedBody();
        $animal->update($data);

        $result['status'] = true;
        $result['data']   = $animal;

        return JsonResponse::withJson($response, $result, 200);
    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
        $animal = Animal::where('id', $args['id'])->first();
        if (!$animal) {
            $result = ['status' => false, 'error' => 'hewan tidak ditemukan'];
            return JsonResponse::withJson($response, $result, 404);
        }

        $animal->delete();
        $result = ['status' => true, 'message' => 'hewan berhasil dihapus'];

        return JsonResponse::withJson($response, $result, 200);
    }
}
