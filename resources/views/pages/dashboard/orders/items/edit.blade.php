<form method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="book">Book</label>
        <select class="form-control border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            name="book_id" id="book_id" x-model="formData.book_id">
            <option value="">Select a book</option>
            @foreach ($books as $book)
                <option value="{{ $book->id }}">
                    {{ $book->name }}
                </option>
            @endforeach
        </select>
        @error('book_id')
            {{ $message }}
        @enderror
    </div>

    <x-input type="number" min="1" name="quantity" label="Quantity" append="copy" 
        x-model="formData.quantity" />

    <x-button type="button"
        @click="
    updateItem('{{ route('dashboard.orders.items.index', ['order' => $order_id]) }}',item.id)
        ">
        Submit
    </x-button>

    <x-button type="button" @click="show=false">
        Close
    </x-button>
</form>
