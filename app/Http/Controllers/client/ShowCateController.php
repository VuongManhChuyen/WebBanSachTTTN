<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class ShowCateController extends Controller
{

    public function ShowAuthor($id)
    {
        $showAuthor = Book::where('author_id', $id)
        ->get();
    $category = Category::get();
    $author = Author::get();
    $showAuthor->load('promotion');

    return view('font/show/searchAuthor', compact('showAuthor'),['category' => $category,'author' => $author]);
    }
   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $showCate = Book::where('category_id', $id)
        ->get();
    $category = Category::get();
    $author = Author::get();
    $showCate->load('promotion');

    return view('font/show/searchCategory', compact('showCate'),['category' => $category,'author' => $author]);
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