<x-app-layout>

<form method="POST" action="{{ route('suggestions.update',$suggestion->id)}}">
    @csrf

    <div class="py-3">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
                    {{ __('Edit Provider Suggestion') }}
                </h1>

                <x-providers.form :provider="$suggestion"></x-providers.form>

                <div class="flex mb-0">
                    @can('delete', $suggestion)
                    <x-btn-danger type="submit" class="mr-auto">
                        {{ __('Delete') }}
                    </x-btn-danger>
                    @endcan

                    @can('update', $suggestion)
                    <x-btn-secondary class="ml-3" type="submit" name="suggestion_status" value="{{ App\Enums\SuggestionStatus::Draft }}">
                        {{ __('Save draft') }}
                    </x-btn-secondary>

                    <x-btn-primary class="ml-3" type="submit" name="suggestion_status" value="{{ App\Enums\SuggestionStatus::Pending }}">
                        {{ __('Submit Suggestion') }}
                    </x-btn-primary>
                    @endcan

                </div>
            </div>
        </div>
    </div>

</form>

</x-app-layout>
