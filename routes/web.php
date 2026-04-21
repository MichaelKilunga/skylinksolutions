<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () { return view('pages.company.about'); });
Route::get('/biometry', function () { return view('pages.services.biometry'); });
Route::get('/cctv-camera', function () { return view('pages.services.cctv-camera'); });
Route::get('/contact', function () { return view('pages.company.contact'); });
Route::get('/electric-fencing', function () { return view('pages.services.electric-fencing'); });
Route::get('/eletric-fencing', function () { return view('pages.services.electric-fencing'); }); // legacy redirect
Route::get('/graphics', function () { return view('pages.services.graphics'); });
Route::get('/ict-cleaning', function () { return view('pages.services.ict-cleaning'); });
Route::get('/ict-maintenance', function () { return view('pages.services.ict-maintenance'); });
Route::get('/', function () { return view('pages.home.index'); });
Route::get('/networking', function () { return view('pages.services.networking'); });
Route::get('/project', function () { return view('pages.portfolio.project'); });
Route::get('/pushsms', function () { return view('pages.services.pushsms'); });
Route::get('/remote', function () { return view('pages.services.remote'); });
Route::get('/setups', function () { return view('pages.services.setups'); });
Route::get('/software-development', function () { return view('pages.services.software-development'); });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
