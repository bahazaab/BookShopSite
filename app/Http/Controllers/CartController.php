<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Book;
use App\Models\Cart;
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
    public function store(StoreCartRequest $request,Book $book)
    {
        $attributes=[
            'user_id'=>Auth::user()->id,
            'book_id'=> $book->id,
            'quantity'=>$request->quantity
        ];

        try {
            Cart::create($attributes);
        } catch (\Exception $e) {
            return redirect()->route('public.details',$book)->withErrors($e->getMessage());
        }
        
return redirect()->route('public.grid');
        
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart=Cart::findOrFail($id);
        try {
            $cart->delete();
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
            ]);
        }

        return response()->json([
            "message" => "Item deleted successfully",
            "orderItems" => Cart::getItems(),
        ]);
    }
}
