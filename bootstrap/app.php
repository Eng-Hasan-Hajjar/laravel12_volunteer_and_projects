<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Events;
use Illuminate\Console\Scheduling\Schedule;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
       //  api: __DIR__.'/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
     
                // تسجيل الـ middleware باسم مختصر 'admin'
      'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
        // ✅ تسجيله داخل مجموعة WEB (المهم)
        $middleware->web(append: [
         
        ]);


    })
    ->withSchedule(function (Schedule $schedule) {

 
    })
    ->withEvents(discover: true)


    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
