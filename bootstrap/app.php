<?php

use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\AuthCheckAll;
use App\Http\Middleware\DisableCache;
use Illuminate\Foundation\Application;
use App\Http\Middleware\SuperAdminAccess;
use App\Http\Middleware\CheckEmailVerificationLink;
use App\Http\Middleware\VerifiedUser;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Exceptions\InvalidSignatureException;


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
            'verified_user' => VerifiedUser::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (InvalidSignatureException $e) {
            return response()->view('admin.auth.notification-verify-email.failed-verify', status: 403);
        });
    })->create();
