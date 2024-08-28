<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Rules\ImageExtension;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $searchTerm = request('search');
            $categories = Category::where('name', 'like', '%' . $searchTerm . '%')->paginate(4);
        } else {
            $categories = Category::latest()->paginate(4);
        }

        return view("pages.dashboard.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.dashboard.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validations = Validator::make($request->all(), [
            "name" => "required|string",
            "image" => ['nullable','url', new ImageExtension()],
            "description" => "nullable",
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        Category::create($request->all());

        return redirect()->route("dashboard.categories.index")->with("success", "Category Created Successfully ");
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        $category_books = $category->books()->paginate(5);
        return view("pages.dashboard.categories.show", compact("category", "category_books"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view("pages.dashboard.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, category $category)
    {
        $validations = Validator::make($request->all(), [
            "name" => "required|string",
            "image" => ['nullable','url', new ImageExtension()],
            "description" => "nullable",
        ]);

        if ($validations->fails()) {
            return redirect()->back()->withErrors($validations)->withInput();
        }

        $category->update($request->all());

        return redirect()->route("dashboard.categories.index")->with("success", "Category Update Successfully ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with("success", "Category Deleted Successfully");
    }
}
