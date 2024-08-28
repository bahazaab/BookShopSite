<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->settings==null){
            return redirect()->route('dashboard.settings.create');
        }
        $total_customers = User::all()->where('type', 'customer')->count();
        $orders = Order::latest('id')->paginate(10);
        $total_orders = Order::all()->count();
        $total_revenue = Order::all()->sum("total");
        return view("pages.dashboard.home", compact("total_customers", "total_orders", "total_revenue","orders"));
    }
}
