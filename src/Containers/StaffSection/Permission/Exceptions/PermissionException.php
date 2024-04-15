<?php

namespace App\Containers\StaffSection\Permission\Exceptions;

use App\Ship\Exceptions\ApplicationException;
use Symfony\Component\HttpFoundation\Response;

class PermissionException extends ApplicationException
{
    public function __construct()
    {
        $this->error = 'FORBIDDEN';
        $this->message = __('StaffSection@Permission::errors.forbidden');
        $this->code = Response::HTTP_FORBIDDEN;
        $this->container = 'Ship';
        $this->data = [];

        parent::__construct();
    }
}
