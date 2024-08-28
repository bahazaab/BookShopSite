<form method="POST">
    @csrf
    @method('POST')

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

    <x-input type="number" min="1" name="quantity" label="Quantity" append="copy" value="1"
        x-model="formData.quantity" />

    <x-button type="button" color="bg-blue-500" @click="addItem('{{ route('dashboard.orders.items.store', $order_id) }}')">
        Submit
    </x-button>

    <x-button type="button" @click="show=false">
        Close
    </x-button>
</form>

