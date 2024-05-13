<?php

namespace App\Ship\Exceptions;

use App\Ship\Core\Abstracts\Exceptions\Exception as BaseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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
                    'message' => is_array($error) ? Arr::first($error) : $error,
                ]);
            }
        }

        return new JsonResponse(
            [
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
