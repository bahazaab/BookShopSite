<x-crud-layout entity='book'>
    <form action="{{ route('dashboard.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <x-error-alert/>

        <x-input name="name" label="Name" required />

        <x-input name="author" label="Author" required />

        <x-textarea name="description" label="Description" required />

        <x-image-input type="url" name="image_url" label="Image URL" required />

        <x-input type="date" name="publication_date" label="Publication Date" required />

        <x-input type="number" name="price" min="0" step="0.001" label="Price" append="$" required />

        <x-input type="number" name="discount" min="0" step="0.001" label="Discount" append="%" />

        <x-input type="number" name="quantity_discount" min="0" step="0.001" label="Quantity Discount"
            append="%" />

        <x-input type="number" name="quantity_for_discount" min="0" label="Quantity For Discount"
            append="Items" />

        <x-button>Save Book</x-button>
    </form>

</x-crud-layout>
