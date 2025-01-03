<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Http\Middleware\RedirectIfNotUser;
use App\Http\Middleware\TrackVisitor;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register middleware aliases as an associative array
        $middleware->alias([
            'admin.auth' => RedirectIfNotAdmin::class,
            'user.auth' => RedirectIfNotUser::class,
            'track.visitor' => TrackVisitor::class,  // Register TrackVisitor alias
        ]);

        // Add other middleware if needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
