<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\SuggestionsController;

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
    return view('index');
})->name('index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/github', [GitHubController::class, 'gitRedirect'])
    ->name('auth.github');
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

// providers
Route::get('providers', [ ProvidersController::class, 'index' ] )
    ->name('providers'); // list providers
Route::get('providers/{provider:id}', [ ProvidersController::class, 'show' ] )
    ->name('providers.show'); // show provider
Route::get('providers/{provider:id}/edit', [ ProvidersController::class, 'edit' ] )
    ->name('providers.edit'); // show provider
Route::post('providers/{provider:id}', [ ProvidersController::class, 'update' ] )
    ->name('providers.update'); // show provider

// suggestions
Route::get('my-suggestions', [ SuggestionsController::class, 'index' ] )
    ->name('suggestions')
    ->middleware('auth'); // show suggest provider form

Route::get('my-suggestions/{suggestion:id}', [ SuggestionsController::class, 'showProviderSuggestion' ] )
    ->name('suggestions.show')
    ->middleware('auth'); // show suggest provider form


Route::get('my-suggestions/{suggestion:id}/edit', [ SuggestionsController::class, 'edit' ] )
    ->name('suggestions.edit')
    ->middleware('auth'); // show suggest provider form

Route::post('my-suggestions/{suggestion:id}', [ SuggestionsController::class, 'update' ] )
    ->name('suggestions.update')
    ->middleware('auth'); // update suggestion

// Route::delete('my-suggestions/{providerSuggestion:id}', [ SuggestionsController::class, 'index' ] )
//     ->name('suggestions')
//     ->middleware('auth'); // show suggest provider form




Route::get('suggest-provider', [ SuggestionsController::class, 'create' ] )
    ->name('suggestions.create')
    ->middleware('can:create,App\Models\MapServiceProviderSuggestion'); // show suggest provider form

Route::post('suggest-provider', [ SuggestionsController::class, 'processCreate' ] )
    ->name('suggestions.create')
    ->middleware('can:create,App\Models\MapServiceProviderSuggestion'); // process suggest provider form data

// Route::get('providers/{id}/suggest-tile-service', [ SuggestionsController::class, 'suggestTileService' ] )->name('providers.tile-service.suggest')->middleware('auth'); // show provider
// Route::post('providers/{id}/suggest-tile-service', [ SuggestionsController::class, 'processSuggestTileService' ] )->name('providers.tile-service.suggest')->middleware('auth'); // show provider
