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
        'App\Models\MapServiceProvider' => 'App\Policies\UserRolePolicy',
        'App\Models\MapTileService' => 'App\Policies\UserRolePolicy',
        'App\Models\MapTileServiceParam' => 'App\Policies\UserRolePolicy',

        'App\Models\MapServiceProviderSuggestion' => 'App\Policies\UserRolePolicy',
        'App\Models\MapTileServiceSuggestion' => 'App\Policies\UserRolePolicy',
        'App\Models\MapTileServiceParamSuggestion' => 'App\Policies\UserRolePolicy',
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
