<x-crud-layout entity="category">
    <form action="{{ route('dashboard.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-error-alert/>

        <x-input name="name" label="Name" value="{{ $category->name }}" required />

        <x-textarea name="description" label="Description">
            {{ $category->description }}
        </x-textarea>

        <x-image-input type="url" name="image" label="Image URL" value="{{ $category->image }}" />

        <x-button>Update Category</x-button>
    </form>
</x-crud-layout>
