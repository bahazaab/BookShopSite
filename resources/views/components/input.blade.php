@props(['disabled' => false, 'label' => '', 'name' => '', 'append' => '','value'=>''])

@php
    if ($append === '') {
        $width = 'w-full';
    } else {
        $width = '';
    }

    if ($value === '') {
        $value = old($name);
    }

@endphp

<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="{{ $label }}">
        {{ $label }}
    </label>
    <input id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"
        {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' =>
                'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ' .$width ,
        ]) !!} /> {{ $append }}
    <x-input-error :for="$name" />
</div>
