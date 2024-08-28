<x-crud-layout entity='report'>
    <x-success-alert/>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($reports as $report)
            <div class="bg-gray-200 rounded-lg p-4">
                <h3 class="text-lg font-bold mb-2">
                    {{ $report->category }} Report
                </h3>
                <p class="mb-4">{{ $report->description }}</p>
                <x-button :href="route('dashboard.reports.show',$report->id)">
                    View Report
                </x-button>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-4">
        {{ $reports->links('vendor.pagination.tailwind') }}
    </div>
</x-crud-layout>
