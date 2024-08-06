<?php

use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\AuthCheckAll;
use App\Http\Middleware\DisableCache;
use Illuminate\Foundation\Application;
use App\Http\Middleware\SuperAdminAccess;
use App\Http\Middleware\CheckEmailVerificationLink;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'adminAccess' => AdminAccess::class,
            'authall' => AuthCheckAll::class,
            'disableCache' => DisableCache::class,
            'checkVerifyLinkExpired' => CheckEmailVerificationLink::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
