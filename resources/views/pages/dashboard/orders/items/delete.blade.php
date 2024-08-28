<form method="POST">
    @csrf
    @method('DELETE')

    <p>Are you sure you want to delete this item?</p>
    <x-button type="button"
        @click="
        deleteItem('{{ route('dashboard.orders.items.index', ['order' => $order_id]) }}',item.id)
        ">
        OK
    </x-button>

    <x-button type="button" @click="show=false">
        Close
    </x-button>
</form>
