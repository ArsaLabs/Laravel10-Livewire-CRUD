<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('customer');
});
Route::get('/transaction', function () {
    return view('transaction');
});
Route::get('/category', function () {
    return view('category_trx');
});
