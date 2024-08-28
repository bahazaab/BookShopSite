<x-crud-layout entity='report'>

    <form action="{{ route('dashboard.reports.update',$report->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-error-alert/>

        <x-input type="text" label="Category" name="category" value="{{ $report->category }}" />

        <x-input type="text" label="Title" name="title" value="{{ $report->title }}"/>

        <x-textarea type="text" label="Description" name="description" >{{ $report->description }}</x-textarea>

        <x-item-select label="Report Status" name="status" :items="makeItems(['draft', 'published', 'archived'])" selectedItemId="{{ $report->status }}"/>

        <x-textarea type="text" label="Content :" name="content" rows="10">{{ $report->content }}</x-textarea>

        <x-button>Update Report</x-button>
    </form>
</x-crud-layout>
