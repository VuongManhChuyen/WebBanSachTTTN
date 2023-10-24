<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Product;
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
    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    public function index()
    {
        $book = Book::get();
        $category = Category::get();
        $book->load('promotion');
        
                //tính tổng tiền của giỏ hàng
                // if(Auth::user()){
                //     $user_id = auth()->user()->id;
                //     $cartItems = Cart::with('products')->where('user_id', $user_id)->get();
                //     $totalPrice = 0;
                //     $totalQuantity = 0;
            
                //     foreach ($cartItems as $cartItem) {
                //         $totalPrice += $cartItem->product_quantity * $cartItem->product_price;
                //         $totalQuantity += $cartItem->product_quantity ;
                //     }
                //     return view('font.shop.index',['sanpham' => $sanpham,'category' => $category , 'totalQuantity' => $totalQuantity,'totalPrice' => $totalPrice]);
                // }
                // else{
                    return view('font.shop.index',['book' => $book,'category' => $category]);
                // }
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
 
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sanpham =  $this->product->with('khuyenmai')->find($id);
        $products = Book::where('category_id', $sanpham->category_id)
        ->where('id', '<>', $sanpham->id)
        ->take(4)
        ->get();
        $products->load('khuyenmai');
        
        if(Auth::user()){
            $user_id = auth()->user()->id;
            $cartItems = Cart::with('products')->where('user_id', $user_id)->get();
            $totalPrice = 0;
            $totalQuantity = 0;
    
            foreach ($cartItems as $cartItem) {
                $totalPrice += $cartItem->product_quantity * $cartItem->product_price;
                $totalQuantity += $cartItem->product_quantity ;
            }
            return view('font.shop.detail',compact('sanpham'),['products'=>$products,'totalQuantity' => $totalQuantity,'totalPrice' => $totalPrice]);
        }
        else{
            return view('font.shop.detail',compact('sanpham'),['products'=>$products]);
        }
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