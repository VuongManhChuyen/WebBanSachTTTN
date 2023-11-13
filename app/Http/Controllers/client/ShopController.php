<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\Khuyenmai;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    protected $book;
    protected $cart;
    public function __construct(Book $book, Cart $cart)
    {
        $this->book = $book;
        $this->cart = $cart;
    }
    public function index()
    {
        if(Auth::user()){
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
    else{
        $book = Book::get();
        $category = Category::get();
        $author = Author::get();
        $book->load('promotion');
        return view('font.shop.index',['book' => $book,'category' => $category,'author' => $author]);
    }
    
}
   
    public function searchCategory()
    {
       return view('font.shop.index');
    }

   
    public function store(Request $request)
    {
 
    }


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