<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'App\Http\Controllers\Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Locations
    Route::post('locations/media', 'LocationsApiController@storeMedia')->name('locations.storeMedia');
    Route::apiResource('locations', 'LocationsApiController');

    // Event Types
    Route::post('event-types/media', 'EventTypesApiController@storeMedia')->name('event-types.storeMedia');
    Route::apiResource('event-types', 'EventTypesApiController');

    // Venues
    Route::post('venues/media', 'VenuesApiController@storeMedia')->name('venues.storeMedia');
    Route::apiResource('venues', 'VenuesApiController');
});
