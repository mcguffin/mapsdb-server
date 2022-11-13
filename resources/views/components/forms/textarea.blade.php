@props(['model' => false, 'name' => '' ])
<label for="{{ $name }}">
    <span class="mb-2">{{ $slot }}</span>
    <textarea class="mt-1 block w-full form-textarea" id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge() }}>{{ $model ? $model->$name : '' }}</textarea>
</label>
