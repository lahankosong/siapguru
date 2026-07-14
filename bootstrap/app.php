<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
        
        // Protect admin routes
        $middleware->group('admin', [
            \App\Http\Middleware\RoleMiddleware::class . ':admin',
        ]);
        
        // Protect tutor routes
        $middleware->group('tutor', [
            \App\Http\Middleware\RoleMiddleware::class . ':tutor,author',
        ]);
        
        // Protect student routes
        $middleware->group('student', [
            \App\Http\Middleware\RoleMiddleware::class . ':student,parent',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();