<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Providers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full border-collapse border border-slate-400">
                    <thead class="bg-slate-50 dark:bg-slate-700">
                        <tr>
                            <th class="w-1/2 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Name') }}</th>
                            <th class="w-1/2 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Home') }}</th>
                            <th class="w-1/2 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td class="border border-slate-300 p-4 text-slate-500">{{ $item->provider_name }}</td>
                                <td class="border border-slate-300 p-4 text-slate-500"><a target="_blank" href="{{ $item->provider_url }}">{{ $item->provider_url }}</a></td>
                                <td class="border border-slate-300 p-4 text-slate-500">
                                    <a classs="bg-sky-500 px-4 py-2" href="{{ route( 'providers.show', $item->id ) }}">
                                        {{ __('View') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
