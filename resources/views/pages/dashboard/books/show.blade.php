<x-crud-layout entity='book'>
    <div class="flex flex-row">
        <div class="mr-4 w-60">
            <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="img-fluid w-full">
        </div>
        <div class="w-1/2">
            <div class="my-8 text-center ">
                <h1 class="text-4xl font-bold mb-4">{{ $book->name }}</h1>
            </div>
            <div class="text-xl">
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>Publication Date:</strong> {{ $book->publication_date }}</p>
                @if ($book->discount == null)
                    <p><strong>Price:</strong> ${{ $book->price }}</p>
                @else
                    <p>
                        <strong>Price:</strong>
                        <del class="text-red-500">${{ $book->price }}</del>
                        <strong>${{ $book->priceAfterDiscount() }}</strong>
                    </p>
                @endif
                <p><strong>Discount:</strong> {{ $book->discount }}%</p>
                <p>
                    <strong>Quantity Discount:</strong>
                    {{ $book->quantity_discount }}% discount on
                    {{ $book->quantity_for_discount }} copy.
                </p>
                @if ($book->hasRatings())
                    <p><strong>Rating Stars:</strong> {{ $book->getStarsRate() }} / 5 stars</p>
                    <p><strong>Number of Ratings:</strong> {{ $book->ratings->count() }} ratings</p>
                @endif
                <p><strong>Categories:</strong> </p>
                <div class="p-4">
                    @foreach ($book->categories as $category)
                        <a href="{{ route('dashboard.categories.show',$category->id) }}" class="bg-blue-500 rounded-full p-2 mr-2">{{ $category->name }}</a>
                    @endforeach
                </div>
                <p><strong>Description:</strong> {{ $book->description }}</p>
            </div>
        </div>
</x-crud-layout>
