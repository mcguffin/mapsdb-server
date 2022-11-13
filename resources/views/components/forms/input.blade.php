@props(['model' => false, 'name' => false ])
<label for="{{ $name }}">
    <span class="mb-2">{{ $slot }}</span>
    <input class="mt-1 block w-full form-input" id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['type' => 'text']) }} value="{{ $model ? $model->$name : '' }}" required />
</label>
