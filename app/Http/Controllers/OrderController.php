<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Event\Code\Throwable;

use function PHPUnit\Framework\isEmpty;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest("id")->paginate(10);
        return view("pages.dashboard.orders.index", compact("orders"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::all("id", "name");
        $books = Book::all();
        $order_id = Order::getNextID();
        $order_items = OrderItem::all()->where('order_id', $order_id);

        return view('pages.dashboard.orders.create', compact('customers', 'books', 'order_id', 'order_items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validations = Validator::make(
            $request->all(),
            [
                'customer_id' => 'required',
                'location' => 'required',
                'note' => 'required',
                'payment_method' => 'required',
                'discount' => 'nullable|numeric|min:0|max:100',
            ]
        );

        if ($validations->fails()) {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $attributes = $request->all();



        $attributes['user_id'] = $attributes['customer_id'];
        $attributes['date'] = Carbon::now()->format('Y-m-d');
        $attributes['total'] = Order::getTotal(Order::getNextID(), $attributes['discount']);

        try {
            Order::create($attributes);
        } catch (\Exception $e) {
            throw $e;
            //return back()->with('error', $e->getMessage());
        }

        return redirect()->route('dashboard.orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('pages.dashboard.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $order_id)
    {
        $books = Book::all();
        $customers = User::all('id', 'name');
        return view('pages.dashboard.orders.edit', compact('order_id', 'books', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $attributes = $request->validate([
            'customer_id' => 'required',
            'status' => 'required',
            'location' => 'required',
            'note' => 'required',
            'payment_method' => 'required',
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        $attributes['user_id'] = $attributes['customer_id'];
        $attributes['total'] = Order::getTotal($order->id, $attributes['discount']);
        $attributes['date'] = $order->date;

        try {
            $order->update($attributes);
        } catch (\Exception $e) {
            throw $e;
            //return back()->with('error', $e->getMessage());
        }

        return redirect()->route('dashboard.orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('dashboard.orders.index')->with('success', 'Order deleted successfully');
    }
}
