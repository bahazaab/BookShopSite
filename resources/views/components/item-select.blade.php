@props(['label' => '', 'name' => '', 'items' => [], 'selectedItemId' => ''])

@php
    if ($selectedItemId === '') {
        $selectedItemId = old($name);
    }
@endphp

<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }} :</label>
    <select class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        id="{{ $name }}" name="{{ $name }}">
        <option value="">Select {{ $label }}</option>
        @foreach ($items as $item)
            <option value="{{ $item->id }}" {{ $selectedItemId == $item->id ? 'selected' : '' }}>
                <div class="flex items-center">
                    <span class="p-2">{{ $item->name }}</span>
                </div>
            </option>
        @endforeach
    </select>

    <x-input-error for="{{ $name }}" />
</div>
