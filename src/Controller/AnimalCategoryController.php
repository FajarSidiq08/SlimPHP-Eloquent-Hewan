<?php

namespace App\Controller;

use App\Model\AnimalCategory;
use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class AnimalCategoryController
{
    public function index(Request $request, Response $response): Response
    {
        $data = AnimalCategory::with(['animal', 'category'])->get();

        $result = [
            'status'  => true,
            'message' => 'Data relasi hewan dan kategori berhasil diambil',
            'data'    => $data
        ];

        return JsonResponse::withJson($response, $result, 200);
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        if (empty($data['animal_id']) || empty($data['category_id'])) {
            $result = [
                'status'  => false,
                'message' => 'animal_id dan category_id wajib diisi',
                'data'    => null
            ];
            return JsonResponse::withJson($response, $result, 400);
        }

        $relasi = AnimalCategory::create($data);

        $result = [
            'status'  => true,
            'message' => 'Relasi hewan dan kategori berhasil ditambahkan',
            'data'    => $relasi
        ];

        return JsonResponse::withJson($response, $result, 201);
    }

    public function update(Request $request, Response $response, array $args): Response
    {
        $relasi = AnimalCategory::where('id', $args['id'])->first();

        if (!$relasi) {
            $result = [
                'status'  => false,
                'message' => 'Relasi hewan dan kategori tidak ditemukan',
                'data'    => null
            ];
            return JsonResponse::withJson($response, $result, 404);
        }

        $data = $request->getParsedBody();
        $relasi->update($data);

        $result = [
            'status'  => true,
            'message' => 'Relasi hewan dan kategori berhasil diperbarui',
            'data'    => $relasi
        ];

        return JsonResponse::withJson($response, $result, 200);
    }

    public function destroy(Request $request, Response $response, array $args): Response
    {
        $relasi = AnimalCategory::where('id', $args['id'])->first();

        if (!$relasi) {
            $result = [
                'status'  => false,
                'message' => 'Relasi hewan dan kategori tidak ditemukan',
                'data'    => null
            ];
            return JsonResponse::withJson($response, $result, 404);
        }

        $relasi->delete();

        $result = [
            'status'  => true,
            'message' => 'Relasi hewan dan kategori berhasil dihapus',
            'data'    => null
        ];

        return JsonResponse::withJson($response, $result, 200);
    }
}
