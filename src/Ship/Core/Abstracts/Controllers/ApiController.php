<?php

namespace App\Ship\Core\Abstracts\Controllers;

use Illuminate\Http\JsonResponse;

abstract class ApiController extends Controller
{
    public string $ui = 'api';

    public function successResponse($data = null, $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse(
            [
                'success' => true,
                'data' => $data,
            ],
            $status,
            $headers,
            $options
        );
    }

    public function errorResponse(mixed $exception, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse(
            [
                'success' => false,
                'error' => $exception->error,
                'message' => $exception->message,
                'container' => $exception->container,
                'data' => $exception->data,
            ],
            $exception->code,
            $headers,
            $options
        );
    }
}
