<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


# router/api.php
Route::group(
        [
                'middleware' => ['api'],
                'prefix' => 'landing'
        ],
        static function ($router) {

            Route::get('menu-list/{lang?}', 'Api\LandingApiController@getMenuList');
            Route::post('menu-list/{lang?}', 'Api\LandingApiController@getMenuList');
//            Route::post('text-section/{lang?}', 'Api\LandingApiController@getSectionText');

//            Route::post('register', 'MemberController@register');

//Route::apiResource('menu-list/{lang}', 'Api\LandingApiController@getMenuList');
        });