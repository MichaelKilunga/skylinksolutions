<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () { return view('pages.about'); });
Route::get('/biometry', function () { return view('pages.biometry'); });
Route::get('/cctv-camera', function () { return view('pages.cctv-camera'); });
Route::get('/contact', function () { return view('pages.contact'); });
Route::get('/eletric-fencing', function () { return view('pages.eletric-fencing'); });
Route::get('/graphics', function () { return view('pages.graphics'); });
Route::get('/ict-cleaning', function () { return view('pages.ict-cleaning'); });
Route::get('/ict-maintenance', function () { return view('pages.ict-maintenance'); });
Route::get('/', function () { return view('pages.index'); });
Route::get('/networking', function () { return view('pages.networking'); });
Route::get('/project', function () { return view('pages.project'); });
Route::get('/pushsms', function () { return view('pages.pushsms'); });
Route::get('/remote', function () { return view('pages.remote'); });
Route::get('/setups', function () { return view('pages.setups'); });
Route::get('/software-development', function () { return view('pages.software-development'); });
