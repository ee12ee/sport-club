<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Traits\ApiResponse;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exception) {
     
        $exception->renderable(function (ValidationException $exception) {
            return ApiResponse::sendResponse(422,'you have validation errors',
                ['errors' => $exception->validator->errors()->all()]);
        });
        $exception->renderable(function (NotFoundHttpException $exception) {
           if ( $exception->getPrevious() instanceof ModelNotFoundException){
               return ApiResponse::sendResponse(404,'record not found');}
           return ApiResponse::sendResponse(404,'route not found');}
       );
       $exception->renderable(function (QueryException $exception) {
        return ApiResponse::sendResponse(400,$exception->getMessage());
    });
    $exception->renderable(function (AuthenticationException $exception){
       return ApiResponse::sendResponse(401,'you are not authenticated');
    });
    $exception->renderable(function (AccessDeniedHttpException $exception){
        return ApiResponse::sendResponse(403,'you are denied');
    });
    })->create();

