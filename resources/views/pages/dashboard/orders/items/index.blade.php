<x-alpain-layout>
    <h2 x-init="indexItems('{{ route('dashboard.orders.items.index', $order_id) }}')" class="font-bold text-lg">
        Order Items :
    </h2>
    <h1 x-text="message"></h1>
    <template x-for="error in errors">
        <p x-text="error" class="text-red-600"></p>
    </template>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600">
                <th>Book Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Quantity Discount</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="item in orderItems">
                <tr class="border-b">
                    <td x-text="item.bookName" class="px-4 py-2"></td>
                    <td x-text="item.quantity" class="px-4 py-2"></td>
                    <td x-text="item.bookPrice" class="px-4 py-2"></td>
                    <td x-text="item.bookDiscount+'%'" class="px-4 py-2"></td>
                    <td x-text="item.bookQuantityDiscount+'% per '+item.bookQuantityForDiscount" class="px-4 py-2"></td>
                    <td x-text="'$'+item.total" class="px-4 py-2"></td>
                    <td class="px-4 py-2">
                        <x-modal title="Edit Order Item"
                            xonclick=",
                        formData.book_id=item.book_id,
                        formData.quantity=item.quantity
                        ">
                            <x-slot name="button">
                                <i class="fa-solid fa-pen-to-square text-base"></i>
                            </x-slot>
                            @include('pages.dashboard.orders.items.edit', [
                                'order_id' => $order_id,
                            ])
                        </x-modal>
                        <x-modal button="delete" title="delete Order Item">
                            <x-slot name="button">
                                <i class="fa-solid fa-trash-can text-base"></i>
                            </x-slot>
                            @include('pages.dashboard.orders.items.delete', [
                                'order_id' => $order_id,
                            ])
                        </x-modal>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>

    <x-modal button="Add Item" title="Add Order Item">
        @include('pages.dashboard.orders.items.create', [
            'order_id' => $order_id,
            'books' => $books,
        ])
    </x-modal>
</x-alpain-layout>
