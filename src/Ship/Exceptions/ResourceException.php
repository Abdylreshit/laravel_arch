<?php

namespace App\Ship\Exceptions;

use App\Ship\Exceptions\ApplicationException as BaseException;
use Symfony\Component\HttpFoundation\Response;

class ResourceException extends BaseException
{
    public function __construct()
    {
        $this->error = 'SERVER_ERROR';
        $this->message = __('ship::errors.server_error');
        $this->container = 'Ship';
        $this->data = [];
        $this->code = Response::HTTP_INTERNAL_SERVER_ERROR;

        parent::__construct();
    }
}
