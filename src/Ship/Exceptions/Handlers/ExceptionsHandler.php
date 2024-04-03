<?php

namespace App\Ship\Exceptions\Handlers;

use App\Ship\Core\Exceptions\Handlers\ExceptionsHandler as CoreExceptionsHandler;
use App\Ship\Exceptions\ModelNotFoundException;
use App\Ship\Exceptions\UnauthenticatedException;
use App\Ship\Exceptions\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException as BaseModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Validation\ValidationException as BaseValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;


class ExceptionsHandler extends CoreExceptionsHandler
{
    protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param  Request  $request
     *
     * @throws Throwable
     */
    public function render($request, Throwable $e): HttpResponse|JsonResponse|Response|RedirectResponse
    {
        if ($this->shouldReturnJson($request, $e)) {
            if ($e instanceof BaseModelNotFoundException) {
                $exception = new ModelNotFoundException;

                return $exception->render();
            }

            if ($e instanceof BaseValidationException) {
                $exception = new ValidationException($e->errors());

                return $exception->render();
            }
        }

        return parent::render($request, $e);
    }

    /**
     * @param  Request  $request
     *
     * @throws UnAuthenticatedException
     */
    protected function unauthenticated($request, AuthenticationException $exception): mixed
    {
        return $this->shouldReturnJson($request, $exception)
            ? throw new UnAuthenticatedException
            : redirect()->guest($exception->redirectTo() ?? route('login'));
    }
}
