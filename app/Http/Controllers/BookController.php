<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(Auth::user()->role_id==2){
            $book = Book::all();
            $book->load('category','author','promotion');
            return view('admin.book.list',['book' => $book]);
        // }
        // else{
        //     return redirect()->route('login');
        // }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $promotion = Promotion::get();
        $author = Author::get();
        return view('admin.book.create',['category' => $category , 'promotion' => $promotion,'author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $name_book = $request->input('name_book');
        $description = $request->input('description');
        $price = $request->input('price');
        $category_id = $request->input('category_id');
        $author_id = $request->input('author_id');
        $promotion_id = $request->input('promotion_id');
        $img = $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('public/images', $img);

        $data = [
            'name_book' => $name_book,
            'description' => $description,
            'price' => $price,
            'category_id' => $category_id,
            'img' => $img,
            'promotion_id' => $promotion_id,
            'author_id' => $author_id,
        ];
        book::create($data);
        return redirect()->route('book.index')
        ->with('success','book has been created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $category = Category::get();
        $promotion = Promotion::get();
        $author = Author::get();
        $book->load('category','promotion','author');
        return view('admin.book.edit',compact('book'),['category' => $category , 'promotion' => $promotion , 'author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        $name_book = $request->input('name_book');
        $description = $request->input('description');
        $price = $request->input('price');
        $category_id = $request->input('category_id');
        $promotion_id = $request->input('promotion_id');
        $author_id = $request->input('author_id');
        
        $book->fill([
            'name_book' => $name_book,
            'description' => $description,
            'price' => $price,
            'category_id' => $category_id,
            'promotion_id' => $promotion_id,
            'author_id' => $author_id,
            ])->save();
            if ($request->file('img') !== null) {
                $img = $request->file('img')->getClientOriginalName(); //lay ten file
                $request->file('img')->storeAs('public/images', $img); //luu file vao duong dan public/images voi ten $logo
                // $anh = $book->img;
                // Storage::delete('public/images/'.$anh);
                $book->fill([
                    'img' => $img,
                ])->save();
            }
            
            return redirect()->route('book.index')
            ->with('success', 'book update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('book.index')
        ->with('success', 'Delete book  successfully');
    }
}