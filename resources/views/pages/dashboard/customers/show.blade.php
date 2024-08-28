<x-crud-layout entity='customer'>
    {{-- show Customer --}}
    <div class="border-t border-gray-200 pt-6">
        <div class="flex justify-items-center mb-4">
            <x-avatar :image="$customer->settings->avatar" :text="$customer->name" />
            <div>
                <h2 class="text-xl font-bold mb-2">Basic Information</h2>
                <p class="mb-2">
                    <span class="font-medium">Name:</span> {{ $customer->name }}
                </p>
                <p class="mb-2">
                    <span class="font-medium">Email:</span> {{ $customer->email }}
                </p>
                <p class="mb-2">
                    <span class="font-medium">Phone:</span> {{ $customer->settings->phone }}
                </p>
            </div>
            <div class="w-10"></div>
            <div>
                <h2 class="text-xl font-bold mb-2">Address</h2>
                <p class="mb-2 w-48">
                    {{ $customer->settings->address }}
                </p>

                <p class="mb-2">
                    <span class="font-medium">Postal Code:</span>
                    {{ $customer->settings->postal_code }}
                </p>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-2">Order History</h2>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">Order #</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer_orders as $order)
                        <tr>
                            <td class="border px-4 py-2">{{ $order->id }}</td>
                            <td class="border px-4 py-2">{{ $order->date }}</td>
                            <td class="border px-4 py-2">${{ $order->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-crud-layout>
