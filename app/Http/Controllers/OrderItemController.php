<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $order_id)
    {
        $order_items = Order::getItems($order_id);
        return response()->json(['orderItems' => $order_items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $order_id)
    {
        $books = Book::all();
        return view('pages.dashboard.orders.items.create', compact('books', 'order_id'));
    }

    /* public function getOrderItems(int $order_id)
    {
        foreach (OrderItem::all()->where('order_id', $order_id) as $item) {
            $total = $item->book->price * $item->quantity * $item->book->discount;
            $order_items[] = [
                "id" => $item->id,
                "book_id" => $item->book->id,
                "bookName" => $item->book->name,
                "quantity" => $item->quantity,
                "bookPrice" => $item->book->price,
                "bookDiscount" => $item->book->discount,
                "total" => $total
            ];
        }

        return $order_items;
    } */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderItemRequest $request, int $order_id)
    {
        $attributes = $request->validate([
            'book_id' => 'required',
            'quantity' => 'required|integer'
        ]);

        $attributes['order_id'] = $order_id;

        try {
            OrderItem::create($attributes);
        } catch (Exception $e) {
            throw new Exception('Something went wrong :' . $e->getMessage());
        } 
        //return redirect()->route('dashboard.orders.create')->with('success', 'item added');
        return response()->json([
            'message' => 'item submitted successfully',
            'orderItems' => Order::getItems($order_id),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderItemRequest $request, int $order_id, int $orderItem_id)
    {
        $attributes = $request->validate([
            'book_id' => 'required',
            'quantity' => 'required|integer'
        ]);

        $attributes['order_id'] = $order_id;

        try {
            $orderItem = OrderItem::findOrFail($orderItem_id);
            $orderItem->update($attributes);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ]);
        }
        //return redirect()->route('dashboard.orders.create')->with('success', 'item added');
        return response()->json([
            'message' => 'item updated successfully',
            'orderItems' => Order::getItems($order_id),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $order_id, string $order_item)
    {
        try {
            $orderItem = OrderItem::findOrFail($order_item);
            $orderItem->delete();
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ]);
        }

        return response()->json([
            "message" => "Item $order_item deleted successfully",
            "orderItems" => Order::getItems($order_id),
        ]);
    }
}
