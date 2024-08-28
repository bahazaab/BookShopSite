<x-crud-layout entity="order">
    <div class="p-4">
        @include('pages.dashboard.orders.items.index', [
            'order_id' => $order_id,
            'books' => $books,
        ])
    </div>
    <form action="{{ route('dashboard.orders.store') }}" method="POST">
        @csrf
        @method('POST')

        <x-error-alert/>

        <x-item-select label="Customer" name="customer_id" :items="$customers" />

        <x-item-select label="Payment Method" name="payment_method" :items="makeItems(['Credit card', 'Debit card', 'Cash'])" />

        <x-input type="number" name="discount" label="Discount" append="%" min="0" step="0.01"
            value="{{ old('discount') }}" />

        <x-textarea name="location" label="Location">{{ old('location') }}</x-textarea>

        <x-textarea name="note" label="Note">{{ old('note') }}</x-textarea>

        <x-button>Create Order</x-button>
    </form>
</x-crud-layout>
