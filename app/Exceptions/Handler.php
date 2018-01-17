<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
        TokenMismatchException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Tratamento de erros somente em produção.
        if (config('app.env') == 'production' || config('app.debug') == false) {

            // A exception deve ser tratada?
            if (!in_array(get_class($exception), $this->dontReport)) {
                
                // Resgata o código do erro.
                $statusCode = $this->isHttpException($exception) ? $e->getStatusCode() : 500;
                
                // Seta a mensagem de erro.
                $error = trans('app.response.error.generic').'<br /><br /><small>'. $exception->getMessage().'</small>';
                
                if ($request->expectsJson()) {
                    // Retorno do json.
                    $json = [
                        'error' => $error,
                    ];
                    
                    $response = response()->json($json, $statusCode);
                } else {
                    // View com o erro.
                    $response = response()
                        ->view('errors.500', ['message' => $error], $statusCode);
                }
                
                return $response->withException($exception);
            }
        }

        return parent::render($request, $exception);
    }
}
