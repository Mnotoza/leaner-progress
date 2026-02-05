<?php

public function register()
{
    $this->reportable(function (Throwable $e) {
        Log::error('Unhandled Exception', [
            'exception' => $e,
            'message' => $e->getMessage(),
        ]);
    });

    $this->renderable(function (Throwable $e, $request) {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Something went wrong',
                'details' => $e->getMessage()
            ], 500);
        }

        return response()->view('errors.general', [
            'message' => 'An unexpected error occurred. Please try again later.'
        ], 500);
    });
}
