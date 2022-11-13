<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\MapServiceProviderSuggestion;
use App\Models\MapTileServiceSuggestion;
use App\Models\MapTileServiceParamsSuggestion;

use App\Enums\SuggestionStatus;


class SuggestionsController extends Controller
{


    /**
     * Show provider list
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('provider.suggestion.index', [
            'suggestions' => Auth::user()
                ? MapServiceProviderSuggestion::where( 'owner', Auth::user()->id )
                : [],
        ]);
    }

    /**
     * Show provider list
     *
     * @return \Illuminate\View\View
     */
    public function showProviderSuggestion(Request $request, MapServiceProviderSuggestion $suggestion) {

        if ($request->user()->cannot('view', $suggestion ) ) {
            abort(403);
        }

        return view('provider.show', [
            'provider' => $suggestion,
            'base' => 'suggestions',
        ]);
    }


    /**
     * Show provider list
     *
     * @return \Illuminate\View\View
     */
    public function showTileServiceSuggestion() {
        abort(501);

        return view('tile-service.suggestion.show', [
        ]);
    }

    /**
     * Show provider suggest form
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request) {

        return view('provider.suggestion.create', [
            // 'suggestion' => new MapServiceProviderSuggestion(),
        ]);
    }

    /**
     * Show provider suggest form
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function processCreate(Request $request) {

        if ($request->user()->cannot('create', MapServiceProviderSuggestion::class)) {
            abort(403);
        }

        $suggestion = MapServiceProviderSuggestion::create([
            'provider_name'        => $request->input('provider_name'),
            'provider_slug'        => $request->input('provider_slug'),
            'provider_url'         => $request->input('provider_url'),
            'provider_description' => $request->input('provider_description', '' ),
            'suggestion_comment'   => $request->input('suggestion_comment', '' ),
            'attribution'          => $request->input('attribution', '' ),
            'suggestion_status'    => SuggestionStatus::Draft->value,
            'owner'                => $request->user()->id,
        ]);
        return redirect("/my-suggestions/{$suggestion->id}");
    }

    /**
     * Show provider suggest form
     * @param MapServiceProviderSuggestion
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, MapServiceProviderSuggestion $suggestion ) {

        if ( $request->user()->cannot('update', $suggestion ) ) {
            abort(403);
        }

        return view('provider.suggestion.edit', [
            'suggestion' => $suggestion
        ]);
    }

    /**
     * Show provider suggest form
     * @param MapServiceProviderSuggestion
     * @return \Illuminate\View\View
     */
    public function update(Request $request, MapServiceProviderSuggestion $suggestion ) {

        if (
            $request->user()->cannot('update', $suggestion )
        ) {
            abort(403);
        }

        foreach ( [
            'provider_name'        => $request->input('provider_name'),
            'provider_slug'        => $request->input('provider_slug'),
            'provider_url'         => $request->input('provider_url'),
            'provider_description' => $request->input('provider_description', '' ),
            'suggestion_comment'   => $request->input('suggestion_comment', '' ),
            'attribution'          => $request->input('attribution', '' ),
            'suggestion_status'    => $request->input('suggestion_status', SuggestionStatus::Draft->value ),
        ] as $attr => $value ) {
            $suggestion->$attr = $value;
        }

        $suggestion->save();
        return redirect("/my-suggestions/{$suggestion->id}");

    }



    /**
     * Show the profile for a given user.
     *
     * @param  MapServiceProvider $provider
     * @return \Illuminate\View\View
     */
    public function suggestTileService( MapServiceProvider $provider ) {
        abort(403);
        if (! Gate::allows('tile-service-suggestion.create', $post)) {
            abort(403);
        }

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
    public function processCreateTileService( Request $request, MapServiceProviderSuggestion $provider ) {
        abort(403);
        if ($request->user()->cannot('create', MapTileServiceSuggestion::class)) {
            abort(403);
        }
        return redirect("/my-suggestions/tile-services/{$id}");
    }
}
