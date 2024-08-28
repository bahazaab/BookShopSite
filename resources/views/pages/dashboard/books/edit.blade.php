<x-crud-layout entity='book'>
    <form action="{{ route('dashboard.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-error-alert/>

        <x-input name="name" label="Name" value="{{ $book->name }}" required />

        <x-input name="author" label="Author" value="{{ $book->author }}" required />

        <x-textarea name="description" label="Description" required>{{ $book->description }}</x-textarea>
        
        <x-image-input name="image_url" type="url" label="Image URL" value="{{ $book->image_url }}" required />

        <x-input type="date" name="publication_date" label="Publication Date" value="{{ $book->publication_date }}"
            required />

        <x-input type="number" name="price" min="0" step="0.001"  label="Price" append="$" value="{{ $book->price }}" required />

        <x-input type="number" name="discount" min="0" step="0.001"  label="Discount" append="%" value="{{ $book->discount }}" />

        <x-input type="number" name="quantity_discount" min="0" step="0.001"  label="Quantity Discount" append="%"
            value="{{ $book->quantity_discount }}" />

        <x-input type="number" name="quantity_for_discount" label="Quantity For Discount" append="Items"
            value="{{ $book->quantity_for_discount }}" />

        <x-button type="submit">Save Book</x-button>
    </form>

</x-crud-layout>
