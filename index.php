<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require _DIR_.'/vendor/autoload.php';

$app = require_once _DIR_.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Fix public path
|--------------------------------------------------------------------------
*/
$app->bind('path.public', function () {
    return _DIR_.'/public';
});

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);