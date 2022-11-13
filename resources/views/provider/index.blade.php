<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map Service Providers') }}
        </h1>
    </x-slot>


    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <div class="flex items-center pb-2">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-3">
                        {{ __('Public Providers') }}
                    </h2>
                    @can('create', App\Models\MapServiceProviderSuggestion::class)
                    <div class="ml-auto">
                        <x-link-btn-primary href="{{ route('suggestions.create') }}">
                            {{ __('Suggest a Provider') }}
                        </x-link-btn-primary>
                    </div>
                    @endcan
                </div>
                <x-providers.list :providers="$providers">
                    <x-slot:base>
                        providers
                    </x-slot>
                </x-providers.list>
            </div>

        </div>
    </div>

    <!-- my suggestions -->
    @can('create', App\Models\MapServiceProviderSuggestion::class)
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-3">
                    {{ __('My Suggestions') }}
                </h2>
                <x-providers.list :providers="$suggestions">
                    <x-slot:base>
                        suggestions
                    </x-slot>
                </x-providers.list>
            </div>
        </div>
    </div>
    @endcan


</x-app-layout>
