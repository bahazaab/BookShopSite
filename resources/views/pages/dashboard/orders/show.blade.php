<x-crud-layout entity="order">
    <div class="container">
        <h1>Order #{{ $order->id }}</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
                <p><strong>Email:</strong> {{ $order->customer->email }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                <p><strong>Total:</strong> ${{ $order->total }}</p>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
            </div>
        </div>

        <h2>Order Items</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->Items as $item)
                    <tr>
                        <td>{{ $item->book->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->book->price }}</td>
                        <td>${{ $item->book->discount }}</td>
                        <td>${{ $item->book->price * $item->quantity * $item->book->discount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-crud-layout>
