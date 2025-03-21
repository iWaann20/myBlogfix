<?php


use Mews\Captcha\Facades\Captcha;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use Mews\Captcha\CaptchaServiceProvider;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

    $app->middleware([
        \App\Http\Middleware\AdminMiddleware::class,
    ]);

    $app->register(Mews\Captcha\CaptchaServiceProvider::class);

    $app->alias('Captcha', Mews\Captcha\Facades\Captcha::class);


    
