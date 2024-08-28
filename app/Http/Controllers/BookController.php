<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Rules\ImageExtension;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $searchTerm = request('search');
            $books = Book::where('name', 'like', '%' . $searchTerm . '%')->orWhere('author', 'like', '%' . $searchTerm . '%')
                ->paginate(4);
        } else {
        $books = Book::latest()->paginate(4);
        }
        return view("pages.dashboard.books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'image_url' => ['nullable','url', new ImageExtension()],
            'publication_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity_discount' => 'nullable|numeric|min:0|max:100',
            'quantity_for_discount' => 'nullable|numeric'
        ]);

        Book::create($validatedData);

        return redirect()->route('dashboard.books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.dashboard.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('pages.dashboard.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'image_url' => ['nullable','url', new ImageExtension()],
            'publication_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity_discount' => 'nullable|numeric|min:0|max:100',
            'quantity_for_discount' => 'nullable|numeric'
        ]);

        $book->update($validatedData);

        return redirect()->route('dashboard.books.index')->with('success', 'Book Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('dashboard.books.index')->with('success', 'Book deleted successfully');
    }
}
