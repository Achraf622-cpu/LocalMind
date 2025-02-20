<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('Hello', function () {
    echo 'Please Kill yourself <3 ;)';
})->purpose('Display an inspiring quote');

Artisan::command('Date', function () {
    echo date("Y-m-d H:i:s");
})->purpose('Display an inspiring quote');
