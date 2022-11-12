<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MapServiceProvider;
use App\Models\MapTileService;
use App\Models\MapTileServiceParams;

class ProvidersController extends Controller
{

    /**
     * Show provider list
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('provider.index', [
            'list' => MapServiceProvider::all()
        ]);

    }

    /**
     * Show provider
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show( MapServiceProvider $provider ) {
        return view('provider.show', [
            'provider' => $provider
        ]);
    }

    /**
     * Show provider suggest form
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function suggest() {
        return view('provider.suggest', [
        ]);
    }

    /**
     * Show provider suggest form
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function processSuggest() {
        return redirect("/providers/{$id}");
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function suggestTileService( $id ) {
        return view('provider.suggest.tile-service', [
            'provider' => MapServiceProvider::findOrFail($id)
        ]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function processSuggestTileService( $id ) {
        return redirect("/providers/{$id}");
    }
}
