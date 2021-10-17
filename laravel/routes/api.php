<?php

use Illuminate\Http\Request;
use App\Http\Controllers\YouTube;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: *' );

Route::get("/test",'YouTube@test');
Route::get("/home",'YouTube@home');
Route::get("/nextPage",'YouTube@nextPage');
Route::get("/search",'YouTube@search');
Route::get("/video",'YouTube@video');