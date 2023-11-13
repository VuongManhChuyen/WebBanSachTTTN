<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
            $keyword = $request->input('keyword');
            $category = Category::get();
            $author = Author::get();
            $search = Book::where('name_book', 'like', '%'.$keyword.'%')
                ->orWhere('price', 'like', '%'.$keyword.'%')
                ->get();
    
            return view('font/shop/search', compact('search'),['category' => $category,'author' => $author]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}