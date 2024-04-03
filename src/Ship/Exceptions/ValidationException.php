<?php

namespace App\Ship\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ValidationException extends ApplicationException
{
    public function __construct(array $data)
    {
        $this->error = 'INVALID_DATA_EXCEPTION';
        $this->message = __('ship::errors.invalid_data');
        $this->code = Response::HTTP_UNPROCESSABLE_ENTITY;
        $this->container = 'Ship';
        $this->data = $data;

        parent::__construct();
    }
}
