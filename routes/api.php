<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/json-api/{id}', 'DashboardController@json_api');
Route::get('/xml-api/{id}', 'DashboardController@xml_api');
