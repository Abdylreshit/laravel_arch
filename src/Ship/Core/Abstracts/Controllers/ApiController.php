<?php

namespace App\Ship\Core\Abstracts\Controllers;

use Illuminate\Http\JsonResponse;

abstract class ApiController extends Controller
{
    public string $ui = 'api';

    public function successResponse($data = null, $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse($data, $status, $headers, $options);
    }

    public function errorResponse(mixed $exception, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse(
            [
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

    public function accepted($data = null, $status = 202, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse($data, $status, $headers, $options);
    }

    public function noContent($status = 204): JsonResponse
    {
        return new JsonResponse(null, $status);
    }
}
