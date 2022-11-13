@props(['provider' => new App\Models\MapServiceProviderSuggestion(),])
<div class="mb-4">
    <x-forms.input name="provider_name" required :model="$provider">
        {{ __('Provider name')}}
    </x-forms.input>
</div>
<div class="mb-4">
    <x-forms.input name="provider_slug" required :model="$provider">
        {{ __('Unique identifier')}}
    </x-forms.input>
    <span class="text-xs text-slate-500">Letters, numbers and dashes only</span>
</div>
<div class="mb-4">
    <x-forms.input name="provider_url" type="url" required :model="$provider">
        {{ __('Provider Homepage')}}
    </x-forms.input>
</div>
<div class="mb-4">
    <x-forms.textarea name="provider_description" :model="$provider">
        {{ __('Provider description')}}
    </x-forms.textarea>
</div>

<div class="mb-4">
    <x-forms.textarea name="attribution" required :model="$provider">
        {{ __('Default Attribution')}}
    </x-forms.textarea>
</div>
