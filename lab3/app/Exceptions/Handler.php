<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\v1\Modules\Doctors\Controllers\DoctorsController;
use App\Http\v1\Modules\Doctors\Controllers\EmptyResourceController;
use App\Http\v1\Modules\Doctors\Resources\DoctorsResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\v1\Modules\Appointments\Controllers\AppointmentsController;
use App\Http\v1\Modules\Appointments\Resources\AppointmentsResource;
use App\Http\v1\Modules\Patients\Controllers\PatientsController;
use App\Http\v1\Modules\Patients\Resources\PatientsResource;
use App\Http\v1\Modules\Doctors\Resources\EmptyResource;
use App\Http\v1\Modules\Doctors\Resources\BadPathResource;
use Illuminate\Validation\ValidationException;
use Throwable;
use TypeError;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

     /**
     * @param Request $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof NotFoundHttpException)
        {
            return response()->json(new BadPathResource($request), 404);
        }

        if ($request->is('api/v1/*')) {
            if ($e instanceof ModelNotFoundException) {
                EmptyResourceController::$code = 404;
                EmptyResourceController::$message = 'NOT FOUND';
                return response()->json(new EmptyResource($request), 404);
            }
            
            if ($e instanceof ValidationException || $e instanceof TypeError) {
                EmptyResourceController::$code = 400;
                EmptyResourceController::$message = 'BAD REQUEST';
                return response()->json(new EmptyResource($request), 400);
            }

            EmptyResourceController::$code = 500;
            EmptyResourceController::$message = "INTERNAL SERVER ERROR";
            return response()->json(new EmptyResource($request), 500);
        }

        return parent::render($request, $e);
    }
}
