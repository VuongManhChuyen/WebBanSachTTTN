<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class ShowCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowAuthor($id)
    {
        $showAuthor = Book::where('author_id', $id)
        ->get();
    $category = Category::get();
    $author = Author::get();
    $showAuthor->load('promotion');

    return view('font/show/searchAuthor', compact('showAuthor'),['category' => $category,'author' => $author]);
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $showCate = Book::where('category_id', $id)
        ->get();
    $category = Category::get();
    $author = Author::get();
    $showCate->load('promotion');

    return view('font/show/searchCategory', compact('showCate'),['category' => $category,'author' => $author]);
    }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}