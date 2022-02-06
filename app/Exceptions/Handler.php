<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
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
        $this->renderable(function (CustomException $e, $request) {
            if ($request->is('api/*')) {

                // log error
                Log::error(
                    "[Error Code] -> "     . $e->getCode() . 
                    " [Error Message] -> " . $e->getMessage() 
                );

                // return json response insted of html page
                return response()->json([
                    'message'    => $e->getMessage(),
                    'code'       => $e->getCode()
                ], 400);
            }
        });
    }
}
