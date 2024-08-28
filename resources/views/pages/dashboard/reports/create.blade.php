<x-crud-layout entity='report'>

    <form action="{{ route('dashboard.reports.store') }}" method="POST">
        @csrf
        @method('POST')

        <x-error-alert />

        <x-input type="text" label="Category" name="category" required />

        <x-input type="text" label="Title" name="title" required />

        <x-textarea type="text" label="Description" name="description" required>
            {{ old('description') }}
        </x-textarea>

        <x-item-select label="Report Status" name="status" :items="makeItems(['draft', 'published', 'archived'])" />

        <x-textarea type="text" label="Content :" name="content" rows="10" required>
            {{ old('content') }}
        </x-textarea>

        <x-button>Create Report</x-button>
    </form>
</x-crud-layout>
