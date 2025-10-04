<?php

namespace App\Controller;

use App\Model\Category;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class CategoryController
{
    public function index(Request $request, Response $response): Response
    {
        $category = Category::all();

        $result['status'] = true;
        $result['data']   = $category;

        return JsonResponse::withJson($response, $result, 200);
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $category = Category::create($data);

        $result['status'] = true;
        $result['data']   = $category;

        return JsonResponse::withJson($response, $result, 200);
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $category = Category::where('id', $args['id'])->first();
        if (!$category) {
            $result = ['status' => false, 'error' => 'category tidak ditemukan'];
            return JsonResponse::withJson($response, $result, 404);
        }

        $data = $request->getParsedBody();
        $category->update($data);

        $result['status'] = true;
        $result['data']   = $category;

        return JsonResponse::withJson($response, $result, 200);
    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
        $category = Category::where('id', $args['id'])->first();
        if (!$category) {
            $result = ['status' => false, 'error' => 'category tidak ditemukan'];
            return JsonResponse::withJson($response, $result, 404);
        }

        $category->delete();
        $result = ['status' => true, 'message' => 'category berhasil dihapus'];

        return JsonResponse::withJson($response, $result, 200);
    }
}
