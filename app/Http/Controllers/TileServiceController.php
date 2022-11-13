<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\MapServiceProvider;
use App\Models\MapTileService;
use App\Models\MapTileServiceParams;

class TileServiceController extends Controller
{

    /**
     * Show provider list
     *
     * @param  MapServiceProvider $provider
     * @param  MapTileService $provider
     * @return \Illuminate\View\View
     */
    public function index(MapServiceProvider $provider) {
        return view('tile-service.index', [
            'tileServices' => MapTileService::where( 'provider_id', $provider->id ),
        ]);
    }

    /**
     * Show provider
     *
     * @param  MapServiceProvider $provider
     * @return \Illuminate\View\View
     */
    public function show( MapServiceProvider $provider, MapTileService $tileService ) {
        return view('tile-service.show', [
            'provider' => $provider,
            'tileService' => $tileService,
        ]);
    }

}
