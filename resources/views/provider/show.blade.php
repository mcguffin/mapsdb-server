
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $provider->provider_name }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <h2 class="mb-6">
                    <span class="flex text-slate-500">
                        {{ __('Suggested Provider') }}
                        @can('update', $provider)
                        <a class="ml-auto px-4 py-2" href="{{ route( "{$base}.edit", $provider->id, 'edit' ) }}">
                            {{ __('Edit') }}
                        </a>
                        @endcan

                    </span>
                    <span class="font-semibold text-2xl text-gray-800 leading-tight">{{ $provider->provider_name }}</span>
                </h2>
                <div class="mb-6">
                    <p><code class="bg-slate-100 px-2 py-1">{{ $provider->provider_slug }}</code></p>
                </div>
                <div class="mb-6">
                    <h3 class="mb-3 font-black text-lg text-gray-800 leading-tight">{{ __('Description') }}</h3>
                    <x-markdown>{!! $provider->provider_description !!}</x-markdown>
                </div>

                <div class="mb-6">
                    <h3 class="mb-3 font-black text-lg text-gray-800 leading-tight">{{ __('Attribution') }}</h3>
                    <pre class="whitespace-normal bg-slate-100 px-2 py-1">{{ $provider->attribution }}</pre>
                </div>

            </div>
        </div>
    </div>

    {{--
        list tile services
    --}}

    @php
    $actions = "{$base}.actions"
    @endphp
    <x-dynamic-component :component="$actions" :provider="$provider"></x-dynamic-component>


</x-app-layout>
