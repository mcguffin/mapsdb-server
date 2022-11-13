<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\MapServiceProvider;
use App\Models\MapTileService;
use App\Models\MapTileServiceParams;

use App\Models\MapServiceProviderSuggestion;

class ProvidersController extends Controller
{

    /**
     * Show provider list
     *
     * @return \Illuminate\View\View
     */
    public function index( Request $request ) {

        return view('provider.index', [
            'providers' => MapServiceProvider::all(),
            'suggestions' => ! is_null($request->user()) && $request->user()->can('create',MapServiceProviderSuggestion::class)
                ? MapServiceProviderSuggestion::where( 'owner', Auth::user()->id )->get()
                : [],
        ]);
    }

    /**
     * Show provider
     *
     * @param  MapServiceProvider $provider
     * @return \Illuminate\View\View
     */
    public function show( Request $request, MapServiceProvider $provider ) {
        return view('provider.show', [
            'provider' => $provider
        ]);
    }

}
