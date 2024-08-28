<x-crud-layout entity="category">
    <form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <x-error-alert/>

        <x-input name="name" label="Name" required />

        <x-textarea name="description" label="Description"/>

        <x-image-input type="url" name="image" label="Image URL"/>

        <x-button>Save Category</x-button>
    </form>
</x-crud-layout>