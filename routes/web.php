<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderItemController;
use App\Models\Attachment;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
-----------------------------------------------------------------------
| Web Routes
-----------------------------------------------------------------------
*/

Route::view('/', 'auth.login');
Route::view('/register', 'auth.register')->name('register');

$dashboardMiddleware = [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
];

// test DB connection
Route::view('/test-database', 'test-database')->middleware($dashboardMiddleware);

/*** dashboard ***/
Route::middleware($dashboardMiddleware)
    ->prefix('dashboard')->name('dashboard.')->group(function () {

        //for home
        Route::get("/", [DashboardController::class, 'index']);

        //for customers
        Route::resource("/customers", UserController::class);

        //for books
        Route::resource("/books", BookController::class);

        //for categories
        Route::resource("/categories", CategoryController::class);

        //for orders
        Route::resource("/orders", OrderController::class);

        //for order item
        Route::resource("orders.items", OrderItemController::class);

        //for reports
        Route::resource("/reports", ReportController::class);

        //for attachments
        Route::resource("/attachments", Attachment::class);

        //for settings
        Route::resource("/settings", SettingController::class);
    });


/*** Public ***/

Route::view("/", 'pages.public.welcome')->name('public.');

Route::get('/cart', function () {
    $cart_total=Cart::getTotal();
    return view('pages.public.shoping-cart',compact('cart_total'));
})->name('public.cart');

Route::get('/cart/index', [CartController::class,'index'])->name('public.cart.index');

Route::delete('/cart/{item}', [CartController::class,'destroy'])->name('public.cart.destroy');

Route::get('/checkout', function () {

    return view('pages.public.checkout');
})->name('public.checkout');

Route::get('/contact', function () {

    return view('pages.public.contact');
})->name('public.contact');

Route::get('/details/{book}', function (Book $book) {
    return view('pages.public.shop-details',compact('book'));
})->name('public.details');

Route::post('/details/{book}', [CartController::class,'store'])->name('public.carts.store');

Route::get('/grid', function () {
    if (request('search')) {
        $searchTerm = request('search');
        $books = Book::where('name', 'like', '%' . $searchTerm . '%')->orWhere('author', 'like', '%' . $searchTerm . '%')->get();
    } else {
        $books = Book::all();
    }
    $categories = Category::all();
    $discounted_books = Book::where('discount', '!=', "null")->get();

    return view('pages.public.shop-grid', compact('books', 'categories', 'discounted_books'));
})->name('public.grid');
