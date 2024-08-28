<x-crud-layout entity='report'>
    <div class="container">
        <h1 class="font-bold text-lg">{{ $report->title }}</h1>
        <p>{{ $report->description }}</p>
        <hr>
        <div class="p-6">
            <p>
            {!! str_replace( '.','.</p><p>',$report->content) !!}
        </p>
        </div>
    </div>

    <x-button :href="route('dashboard.reports.edit',$report->id)">Edit</x-button>
    <x-danger-button id="{{ $report->id }}" entity="report">Delete</x-danger-button>
</x-crud-layout>
