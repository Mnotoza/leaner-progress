<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        // Handle specific exceptions
        $this->renderable(function (\Illuminate\Database\QueryException $e, $request) {
            return response()->json([
                'error' => 'Database error occurred',
                'message' => $e->getMessage(),
            ], 500);
        });

        $this->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            return response()->json([
                'error' => 'Resource not found',
            ], 404);
        });
    }
}



