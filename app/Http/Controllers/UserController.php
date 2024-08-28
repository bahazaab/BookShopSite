<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $searchTerm = request('search');
            $customers = User::where('name', 'like', '%' . $searchTerm . '%')->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->paginate(5);
        } else {
            $customers = User::where('type', 'customer')->paginate(5);
        }
        return view(
            "pages.dashboard.customers.index",
            compact("customers")
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        $customer_orders = $customer->latestOrder()->paginate(5);
        return view('pages.dashboard.customers.show', compact('customer', 'customer_orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        return view('pages.dashboard.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'profile_photo' => 'image|max:2048', // Validate the profile image
        ]);



        if ($request->hasFile('profile_photo')) {
            // Store the profile image
            $image = $request->file('profile_photo');
            $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Update the customer's profile_image field
            $validatedData['profile_photo'] = env('APP_URL') . env('APP_IMAGE_path') . $imageName;
        }


        $customer->update($validatedData);

        return redirect()->route('dashboard.customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('dashboard.customers.index')->with('success', 'Customer deleted successfully');
    }
}
