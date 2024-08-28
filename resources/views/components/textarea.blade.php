@props(['label' => '', 'name' => ''])

<div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="{{ $label }}">
        {{ $label }}
    </label>
    <textarea id="{{ $name }}" name="{{ $name }}" 
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        {!! $attributes->merge([
            'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full',
        ]) !!}>
        {{ ($slot==="")? old($name): $slot}}
    </textarea>
    <x-input-error :for="$name"/>
</div>
