<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;

use App\Models\MapServiceProvider;
use App\Models\MapTileService;
use App\Models\MapTileServiceParam;

use App\Models\MapServiceProviderSuggestion;
use App\Models\MapTileServiceSuggestion;
use App\Models\MapTileServiceParamSuggestion;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\MapServiceProvider' => 'App\Policies\ProviderPolicy',
        'App\Models\MapTileService' => 'App\Policies\ProviderPolicy',
        'App\Models\MapTileServiceParam' => 'App\Policies\ProviderPolicy',

        'App\Models\MapServiceProviderSuggestion' => 'App\Policies\SuggestionPolicy',
        'App\Models\MapTileServiceSuggestion' => 'App\Policies\SuggestionPolicy',
        'App\Models\MapTileServiceParamSuggestion' => 'App\Policies\SuggestionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }

}
