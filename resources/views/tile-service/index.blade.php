<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tile Service Providers') }}
        </h1>
    </x-slot>

    <div class="pt-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden">
                <x-link-btn-primary>
                    <x-slot:href>
                        {{ route('tile-service.suggest',$provider->id) }}
                    </x-slot>
                    {{ __('Suggest a Service') }}
                </x-link-btn-primary>
            </div>
        </div>
    </div>


    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-3">
                    {{ __('Services of ') }} {{ $provider->name }}
                </h2>
                @foreach ($tileServices as $item)
                    {{ var_dump( $item->toArray() )}}
                @endforeach
            </div>

        </div>
    </div>

    <!-- my suggestions -->
    @can('create',MapServiceProviderSuggestion::class)
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-3">
                    {{ __('My Suggestions') }}
                </h2>
                <table class="w-full border-collapse border border-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700">
                        <tr>
                            <th class="w-1/2 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Name') }}</th>
                            <th class="w-1/2 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Homepage') }}</th>
                            <th class="w-1/2 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suggestions as $item)
                            <tr>
                                <td class="border border-slate-300 p-4 text-slate-500">{{ $item->provider_name }}</td>
                                <td class="border border-slate-300 p-4 text-slate-500"><a target="_blank" href="{{ $item->provider_url }}">{{ $item->provider_url }}</a></td>
                                <td class="border border-slate-300 p-4 text-slate-500">
                                    @can('update',$item)
                                    !EDIT!
                                    @endcan
                                    @can('delete',$item)
                                    DELETE
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endcan


</x-app-layout>
