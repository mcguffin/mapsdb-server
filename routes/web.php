<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ProvidersController;

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
    // TODO
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

Route::get('providers', [ ProvidersController::class, 'index' ] )->name('providers'); // list providers
Route::get('providers/{provider:id}', [ ProvidersController::class, 'show' ] )->name('providers.show'); // show provider
Route::get('providers/suggest', [ ProvidersController::class, 'suggest' ] )->name('providers.suggest'); // show suggest provider form
Route::post('providers/suggest', [ ProvidersController::class, 'processSuggest' ] )->name('providers.suggest'); // process suggest provider form data

Route::get('providers/{id}/suggest-tile-service', [ ProvidersController::class, 'suggestTileService' ] )->name('providers.tile-service.suggest'); // show provider
Route::post('providers/{id}/suggest-tile-service', [ ProvidersController::class, 'processSuggestTileService' ] )->name('providers.tile-service.suggest'); // show provider
