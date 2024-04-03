<?php

namespace App\Ship\Exceptions;

use App\Ship\Core\Abstracts\Exceptions\Exception as BaseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @OA\Schema(
 *      schema="ApplicationException",
 *
 *      @OA\Property(
 *          property="message",
 *          type="string",
 *          description="Error message",
 *      ),
 *      @OA\Property(
 *          property="error",
 *          type="string",
 *          description="ERROR",
 *      ),
 *      @OA\Property(
 *          property="container",
 *          type="string",
 *          description="Container name",
 *      ),
 *      @OA\Property(
 *          property="data",
 *          description="error data messages",
 *          type="array",
 *          collectionFormat="multi",
 *
 *          @OA\Items(type="object"),
 *      )
 *  )
 */
class ApplicationException extends BaseException
{
    /**
     * @var @string
     */
    public $error;

    /**
     * @var @string
     */
    public $message;

    /**
     * @var @string
     */
    public $container;

    /**
     * @var @array
     */
    public $data;

    /**
     * @var @int
     */
    public $code;

    public function render(): JsonResponse
    {
        $data = new Collection();

        if ($this->data) {
            foreach ($this->data as $key => $error) {
                $data->push([
                    'key' => $key,
                    'message' => Arr::first($error),
                ]);
            }
        }

        return new JsonResponse(
            [
                'success' => false,
                'error' => $this->error,
                'message' => $this->message,
                'container' => $this->container,
                'data' => ! $data->count() ? [] : $data,
            ],
            $this->code,
        );
    }

    public function replaceAttribute($message, $attribute): array|string
    {
        return str_replace(
            [':attribute', ':ATTRIBUTE', ':Attribute'],
            [$attribute, Str::upper($attribute), Str::ucfirst($attribute)],
            $message
        );
    }
}
