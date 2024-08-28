<x-app-layout>
    <x-success-alert/>
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold mb-2">Total Customers</h3>
            <p class="text-4xl font-bold">{{ number_format($total_customers) }}</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold mb-2">Total Orders</h3>
            <p class="text-4xl font-bold">{{ number_format($total_orders) }}</p>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-bold mb-2">Total Revenue</h3>
            <p class="text-4xl font-bold">${{ number_format($total_revenue) }}</p>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-bold mb-4">Recent Orders</h2>
        <table class="w-full bg-white shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 text-center">Order ID</th>
                    <th class="py-3 px-4 text-center">Customer</th>
                    <th class="py-3 px-4 text-center">Total</th>
                    <th class="py-3 px-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="py-3 px-4 text-center">
                            {{ $order->id }}
                        </td>
                        <td class="py-3 px-4 text-center">
                            {{ $order->customer->name }}
                        </td>
                        <td class="py-3 px-4 text-center">
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-center mt-4">
            {{ $orders->links('vendor.pagination.tailwind') }}
        </div>

    </div>
</x-app-layout>
