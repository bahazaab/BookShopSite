<x-crud-layout entity="category">
    <x-success-alert/>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($categories as $category)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <a href="{{ route('dashboard.categories.show', $category->id) }}">
                    <img src="{{ $category->image }}" alt="category Cover" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{ route('dashboard.categories.show', $category->id) }}">
                        <h3 class="text-lg font-bold h-16 overflow-hidden">
                            {{ $category->name }}
                        </h3>
                        <p class="text-gray-600 mb-1 h-10 ">
                            {{ $category->description }}
                        </p>
                    </a>
                    <div class="flex justify-between">
                        <x-button :href="route('dashboard.categories.edit', $category->id)">
                            Edit
                        </x-button>
                        <x-danger-button :id="$category->id" entity="category">
                            Delete
                        </x-danger-button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        {{ $categories->links('vendor.pagination.tailwind') }}
    </div>
</x-crud-layout>