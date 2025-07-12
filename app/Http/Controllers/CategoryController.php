<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryName = $request->categoryName;
        $request->validate([
            'categoryName' => 'required|string|min:3|max:255',
        ]);
        Category::create([
            'name' => $categoryName,
        ]);
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.category.deail', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.category.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryName = $request->categoryName;
        $request->validate([
            'categoryName' => 'required|string|min:3|max:255',
        ]);
        Category::find($id)->update([
            'name' => $categoryName,
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->route('categories.index');
        // --- IGNORE ---
    }
}
