<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Process;

Route::get('/', function () {
    $result = Process::run('ls -la');

    return $result->output();
});
