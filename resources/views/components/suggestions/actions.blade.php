<div class="py-3">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="px-4 py-8 bg-white overflow-hidden shadow-xl flex">
            @can('delete', $provider)
            <x-btn-danger type="submit" class="mr-auto">
                {{ __('Delete') }}
            </x-btn-danger>
            @endcan

            @can('update', $provider)
            <x-btn-primary class="ml-3" type="submit" name="suggestion_status" value="{{ App\Enums\SuggestionStatus::Pending }}">
                {{ __('Submit Suggestion') }}
            </x-btn-primary>
            @endcan

            @can('approve', $provider)
            <x-btn-primary class="ml-3" type="submit" name="suggestion_status" value="{{ App\Enums\SuggestionStatus::Approved }}">
                {{ __('Approve') }}
            </x-btn-primary>
            @endcan

            @can('reject', $provider)
            <x-btn-primary class="ml-3" type="submit" name="suggestion_status" value="{{ App\Enums\SuggestionStatus::Rejected }}">
                {{ __('Reject') }}
            </x-btn-primary>
            @endcan


            {{--
                approve
            --}}

        </div>
    </div>
</div>
