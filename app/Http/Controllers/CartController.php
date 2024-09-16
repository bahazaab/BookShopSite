<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart_items = Cart::getItems();
        return response()->json(['orderItems' => $cart_items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request, Book $book)
    {
        if(Auth::user()==null){
            return redirect()->route('login');
        }

        if (Auth::user()->hasCart()) {
            try {
                Cart::create(['user_id' => Auth::user()->id]);
            } catch (\Exception $e) {
                return redirect()->route('public.details', $book)->withErrors($e->getMessage());
            }
        }

        $attributes = [
            'order_id' => Order::getNextID(),
            'cart_id' => Auth::user()->cart->id,
            'book_id' => $book->id,
            'quantity' => $request->quantity
        ];

        try {
            OrderItem::create($attributes);
        } catch (Exception $e) {
            throw new Exception('Something went wrong :' . $e->getMessage());
        }
        return redirect()->route('public.grid')->with('success', 'item added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    public function deleteItem(string $order_item)
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
            "orderItems" => Cart::getItems(),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $cart = Auth::user()->cart;
        try {
            $cart->delete();
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ]);
        }

        return response()->json([
            "message" => "Cart deleted successfully",
            "orderItems" => Cart::getItems(),
        ]);
    }
}
