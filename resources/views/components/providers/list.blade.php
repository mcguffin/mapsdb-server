<table class="w-full border-collapse border border-slate-400">
    <thead class="bg-slate-50 dark:bg-slate-700">
        <tr>
            <th class="w-10 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Status') }}</th>
            <th class="w-auto border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Name') }}</th>
            <th class="w-1/3 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left">{{ __('Slug') }}</th>
            <th class="w-1/6 border border-slate-300 font-semibold px-4 py-2 text-slate-900 text-left"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $providers as $item )
            <tr>
                <td class="border border-slate-300 p-4 text-slate-500">
                    @if ( $base == 'suggestions' )
                        {{ $item->suggestion_status }}
                    @else
                        {{ $item->provider_status }}
                    @endif
                </td>
                <td class="border border-slate-300 p-4 text-slate-500">
                    <p class="block">{{ $item->provider_name }}</p>
                    <a class="text-xs text-slate-700" target="_blank" href="{{ $item->provider_url }}">{{ $item->provider_url }}</a>
                </td>
                <td class="border border-slate-300 p-4 text-slate-500">{{ $item->provider_slug }}</td>
                <td class="border border-slate-300 p-4 text-slate-500">
                    @can('view', $item)
                    <a class="px-4 py-2" href="{{ route( "{$base}.show", $item->id ) }}">
                        {{ __('View') }}
                    </a>
                    @endcan

                    @can('update', $item)
                    <a class="px-4 py-2" href="{{ route( "{$base}.edit", $item->id, 'edit' ) }}">
                        {{ __('Edit') }}
                    </a>
                    @endcan
<!--
                    @can('delete', $item)
                    <a class="px-4 py-2 text-rose-600" href="{{ route( "$base", $item->id ) }}">
                        {{ __('Delete') }}
                    </a>
                    @endcan -->

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
