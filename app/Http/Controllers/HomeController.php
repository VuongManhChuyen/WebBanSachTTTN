<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $book = Book::get();
        $category = Category::get();
        $promotion = Promotion::get();
        $author = Author::get();
        $banner = Banner::get();
        $book->load('category','promotion');
        return view('font.index' ,compact('book'), ['book' => $book,'category' => $category,'promotion' => $promotion,'author' => $author ,'banner' => $banner]);
        //tính tổng tiền của giỏ hàng
    //     if(Auth::user()){
    //     $user_id = auth()->user()->id;
    //     $cartItems = Cart::with('products')->where('user_id', $user_id)->get();
    //     $totalPrice = 0;
    //     $totalQuantity = 0;

    //     foreach ($cartItems as $cartItem) {
    //         $totalPrice += $cartItem->product_quantity * $cartItem->product_price;
    //         $totalQuantity += $cartItem->product_quantity ;
    //     }
    //     return view('font.index' ,compact('product'), ['product' => $product,'category' => $category,'khuyenmai' => $khuyenmai,'banner' => $banner,
    //     'totalPrice' => $totalPrice , 'totalQuantity' => $totalQuantity]);
    // }
    // else{
    //     return view('font.index' ,compact('product'), ['product' => $product,'category' => $category,'khuyenmai' => $khuyenmai,'banner' => $banner]);
    // }
        
}

    /**
     * Show the form for creating a new resource.
     */
    public function checkUserType()
    {
        if(Auth::user()->role_id==2){
            return redirect()->route('adminn');
        }
        if(Auth::user()->role_id==1){
            return redirect()->route('/');
        }
    }
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
        //
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