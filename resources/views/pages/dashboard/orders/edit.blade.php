<x-crud-layout entity="order">
    @include('pages.dashboard.orders.items.index', [
        'order_id' => $order_id,
        'books' => $books,
    ])

    @php
        $order = App\Models\Order::find($order_id);
    @endphp
    <form action="{{ route('dashboard.orders.update', $order_id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-error-alert/>

        <x-item-select label="Customer" name="customer_id" :items="$customers" selectedItemId="{{ $order->customer->id }}" />

        <x-item-select label="Payment Method" name="payment_method" :items="makeItems(['Credit card', 'Debit card', 'Cash'])"
            selectedItemId="{{ $order->payment_method }}" />

        <x-item-select label="Order Status" name="status" :items="makeItems(['Pending', 'Shipped', 'Delivered', 'Canceled '])" selectedItemId="{{ $order->status }}" />

        <x-input type="number" name="discount" label="Discount" append="%" min="0" step="0.01"
            value="{{ $order->discount }}" />

        <x-input name="total" label="Old Total :" append="$" value="{{ $order->total }}" disabled />

        <x-textarea name="location" label="Location">{{ $order->location }}</x-textarea>

        <x-textarea name="note" label="Note">{{ $order->note }}</x-textarea>

        <x-button>Update Order</x-button>
    </form>
</x-crud-layout>
