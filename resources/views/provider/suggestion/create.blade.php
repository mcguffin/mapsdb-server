<x-app-layout>

<form method="POST" action="{{ route('suggestions.create')}}">
    @csrf

    <div class="py-3">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-8 bg-white overflow-hidden shadow-xl">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
                    {{ __('Suggest Provider') }}
                </h1>

                <x-providers.form></x-providers.form>

                <div class="mb-4">
                    <x-forms.textarea name="suggestion_comment">
                        {{ __('Your comment')}}
                    </x-forms.textarea>
                </div>

                <div class="mb-0">
                    <x-btn-secondary type="submit">
                        {{ __('Save draft') }}
                    </x-btn-secondary>
                </div>
            </div>
        </div>
    </div>

</form>

</x-app-layout>
