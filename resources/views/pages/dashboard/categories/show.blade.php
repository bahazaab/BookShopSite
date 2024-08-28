<x-crud-layout entity="category">
    <div class="mb-6 text-center">
        <h1 class="text-4xl font-bold">{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($category_books as $book)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <a href="{{ route('dashboard.books.show', $book->id) }}">
                    <img src="{{ $book->image_url }}" alt="Book Cover" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{ route('dashboard.books.show', $book->id) }}">
                        <h3 class="text-lg font-bold h-16 overflow-hidden">
                            {{ $book->name }}
                        </h3>
                        <p class="text-gray-600 mb-1 h-10 ">
                            {{ $book->author }}
                        </p>
                        <p class="text-gray-600 mb-2">
                            ${{ $book->price }}
                        </p>
                    </a>
                    <div class="flex justify-between">
                        <x-button :href="route('dashboard.books.edit', $book->id)">
                            Edit
                        </x-button>
                        <x-danger-button :id="$book->id" entity="book">
                            Delete
                        </x-danger-button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        {{ $category_books->links('vendor.pagination.tailwind') }}
    </div>
</x-crud-layout>