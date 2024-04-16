<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function prepareException(Throwable $e)
{
    if ($e instanceof HttpException && $e->getStatusCode() == 404) {
        // Deixe o Laravel lidar com o redirecionamento automaticamente
        return $e;
    }

    if ($e instanceof HttpException && $e->getStatusCode() == 403) {
        // Deixe o Laravel lidar com o redirecionamento automaticamente
        return $e;
    }

    return parent::prepareException($e);
}
}