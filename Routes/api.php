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

/*
 * Route for telegram bot api webhook.
 */
Route::prefix('tgbot')->group(function() {
    /*
    Route::get('/test', function () {
       return morphos\Russian\GeographicalNamesInflection::getCase('Самара', morphos\Russian\Cases::LOCATIVE);
    });
    */
    Route::post('/webhook/{token}', 'TgBotController@handle');
});
