<x-crud-layout entity="order">
    <x-success-alert/>
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                    <th class="px-4 py-2 text-left">Order ID</th>
                    <th class="px-4 py-2 text-left">Customer</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            {{ $order->id }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $order->customer->name ?? 'null' }}
                        </td>
                        <td class="px-4 py-2">
                            ${{ $order->total }}
                        </td>
                        @if ($order->status === 'Delivered')
                            <td class="py-3 px-4 text-center text-green-500">
                                Delivered
                            </td>
                        @elseif($order->status === 'Pending')
                            <td class="py-3 px-4 text-center text-yellow-500">
                                Pending
                            </td>
                        @elseif($order->status === 'Shipped')
                            <td class="py-3 px-4 text-center text-blue-500">
                                Shipped
                            </td>
                        @elseif($order->status === 'Canceled')
                            <td class="py-3 px-4 text-center text-red-500">
                                Canceled
                            </td>
                        @endif
                        <td class="px-4 py-2">
                            <x-button :href="route('dashboard.orders.show', $order->id)">
                                View
                            </x-button>
                            <x-button :href="route('dashboard.orders.edit', $order->id)">
                                {{ $order->status === 'Delivered' ? 'Review' : 'Edit' }}
                            </x-button>
                            @unless ($order->status === 'Delivered')
                                <x-danger-button id="{{ $order->id }}" entity="order">
                                    @if($order->status === 'Canceled')
                                    delete
                                    @else
                                    Cancel
                                    @endif
                                </x-danger-button>
                            @endunless
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-center mt-4">
            {{ $orders->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</x-crud-layout>
