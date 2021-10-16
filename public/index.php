<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

if (file_exists(__DIR__ . '/../storage/framework/maintenance.php')) require __DIR__ . '/../storage/framework/maintenance.php';

require __DIR__ . '/../vendor/autoload.php';

$application = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $application->make(Kernel::class);
$response = tap($kernel->handle($request = Request::capture()))->send();

$kernel->terminate($request, $response);