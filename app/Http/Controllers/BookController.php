<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view("backend.Book.list", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("backend.Book.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'bookName' => 'required|string|min:3|max:255',
            'bookAuthor' => 'required|string|min:3|max:255',
            'bookPrice' => 'required|numeric',
            'bookCategory' => 'required|numeric|exists:categories,id',
            'bookImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bookDescription' => 'required|string|min:10|max:1000',
            
        ]);

        $book = new Book();
            $book->name = $request->bookName;
            $book->author = $request->bookAuthor;
            $book->price = $request->bookPrice;
            $book->category_id = $request->bookCategory;
            $book->description = $request->bookDescription;

            if ($request->hasFile('bookImage')) {
                $image = $request->file('bookImage');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $uploadPath = public_path('images/books');
                $image->move($uploadPath, $imageName);
                $book->image ='images/books/'. $imageName;
            }

            $book->save();
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
        }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("backend.Book.deail", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view("backend.Book.edit", compact("book", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("books.index")->with("success","Book deleted successfully.");
    }
}
