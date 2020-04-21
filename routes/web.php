<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-a-single-queue', function () {
    App\Jobs\ProcessStandard::dispatch();

    return response('The queue was dispatched! Check the SQS queue on AWS Panel to see your messages.');
});

Route::get('/test-a-chained-queue', function() {
    App\Jobs\ProcessStandard::withChain([
        new App\Jobs\ProcessAnotherStandard,
        new App\Jobs\ProcessMasterStandard
    ])->dispatch();

    return response('The chained queue was dispatched! Wise choice ...');
});
