<?php

namespace App\Ship\Exceptions;

use App\Ship\Exceptions\ApplicationException as BaseException;
use Symfony\Component\HttpFoundation\Response;

class UnauthenticatedException extends BaseException
{
    public function __construct()
    {
        $this->error = 'UNAUTHORIZED';
        $this->message = __('ship::errors.unauthorized');
        $this->container = 'Ship';
        $this->data = [];
        $this->code = Response::HTTP_UNAUTHORIZED;

        parent::__construct();
    }
}
