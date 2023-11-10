<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Khuyenmai;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $book;
    protected $cart;
    public function __construct(Book $book, Cart $cart)
    {
        $this->book = $book;
        $this->cart = $cart;
    }
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::user()->id;
        $cart = $this->cart->firtOrCreateBy($userId)->load('book','cartuser');
        
        $cart = Cart::where('user_id',Auth()->user()->id)->first();
        $cart_id = $cart->id;
        $book = Book::get();
        $category = Category::get();
        $author = Author::get();
        $book->load('promotion');
        
        return view('font.shop.index',compact('cart_id'),['book' => $book,'category' => $category,'author' => $author,'cart_id'=>$cart_id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function searchCategory()
    {
       return view('font.shop.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book =  $this->book->with('promotion')->find($id);
        $books = Book::where('category_id', $book->category_id)
        ->where('id', '<>', $book->id)
        ->take(4)
        ->get();
        $books->load('promotion');
        
        // if(Auth::user()){
        //     $user_id = auth()->user()->id;
        //     $cartItems = Cart::with('products')->where('user_id', $user_id)->get();
        //     $totalPrice = 0;
        //     $totalQuantity = 0;
    
        //     foreach ($cartItems as $cartItem) {
        //         $totalPrice += $cartItem->product_quantity * $cartItem->product_price;
        //         $totalQuantity += $cartItem->product_quantity ;
        //     }
        //     return view('font.shop.detail',compact('sanpham'),['products'=>$products,'totalQuantity' => $totalQuantity,'totalPrice' => $totalPrice]);
        // }
        // else{
            return view('font.shop.detail',compact('book'),['books'=>$books]);
        // }
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