<x-crud-layout entity='customer'>
    <x-success-alert/>
    <table class="w-full">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-3 px-4  text-center">Name</th>
                <th class="py-3 px-4  text-center">Email</th>
                <th class="py-3 px-4  text-center">Phone</th>
                <th class="py-3 px-4  text-center">Total Orders</th>
                <th class="py-3 px-4  text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr class="border-b">
                    <td class="py-3 px-3 text-center">
                        <div class="flex items-center">
                            <div class="w-20 overflow-hidden">
                                <img src="{{ $customer->settings->avatar }}" alt="{{ $customer->name }}"
                                    class="w-12 h-12 object-cover rounded-full">
                            </div>
                            <span class="ml-3">{{ $customer->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        {{ $customer->email }}
                    </td>
                    <td class="py-3 px-4 text-center">
                        {{ $customer->settings->phone }}
                    </td>
                    <td class="py-3 px-4 text-center">
                        {{ $customer->orders->count() }}
                    </td>
                    <td class="py-3 px-4 text-center w-full">
                        <x-button :href="route('dashboard.customers.show', $customer->id)" title="Show">
                            <i class="fa-solid fa-file-lines text-base"></i>
                        </x-button>
                        <x-button :href="route('dashboard.customers.edit', $customer->id)" title="Edit">
                            <i class="fa-solid fa-pen-to-square text-base"></i>
                        </x-button>
                        <x-danger-button  :id="$customer->id" entity="customer" title="Delete">
                            <i class="fa-solid fa-trash-can text-base"></i>
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="flex justify-center mt-4">
        {{ $customers->links('vendor.pagination.tailwind') }}
    </div>
</x-crud-layout>
