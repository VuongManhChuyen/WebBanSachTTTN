<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use App\Models\Cartuser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    
    protected $cart;
    protected $book;
    protected $cartuser;

    public function __construct(Book $book, Cart $cart, Cartuser $cartuser, )
    {
        $this->book = $book;
        $this->cart = $cart;
        $this->cartuser = $cartuser;
    }

    public function index()
    {    $user = Auth::user();
        $userId = Auth::user()->id;
        $cart = $this->cart->firtOrCreateBy($userId)->load('book','cartuser');
        $cartuser = Cartuser::find($userId);
        $check = Cart::get();
        $check_id = '';
        foreach ($check as $check){
            $check_id = $check->user_id;
        }

        //tính tổng tiền của giỏ hàng
        $user_id = auth()->user()->id;
        $cartItems = Cart::with('cartuser.book')->where('user_id', $user_id)->first();
        // dd( $cartItems );
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cartItems->cartuser as $cartProduct) {
            $totalPrice += $cartProduct->book_quantity * $cartProduct->book_price;
            $totalQuantity += $cartProduct->book_quantity ;
        }
        return view('font.cart.index',compact('cart'),['check_id' => $check_id,'totalPrice' => $totalPrice , 'totalQuantity' => $totalQuantity]);
          
    }
    // public function getTotalQuantity()
    // {
    //     $user = Auth::user();
    //     $cart = $user->cart()->get();
        
    //     return view('font.index', compact('cart'));
    // }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        // Kiểm tra xem sản phẩm có trong giỏ hàng của người dùng không  
        $user_id = auth()->user()->id;
        $book_id =$request->book_id;
        $cart_id = $request->cart_id;
        $bookInCart = Cart::where('user_id', $user_id)
        ->whereHas('cartuser', function ($query) use ($book_id) {
            $query->where('book_id', $book_id);
        })
        ->exists();
        // dd(!$bookInCart);
        if (!$bookInCart) {
            $book_id =$request->book_id;
            $book_price =$request->book_price;
            $cart_id = $request->cart_id;
            $book_quantity =$request->book_quantity;
        $data=[
                    
                    'book_id' => $book_id,
                    'book_price' => $book_price,
                    'book_quantity' => $book_quantity,
                    'cart_id' =>$cart_id,
              
           
        ];
        // dd($data);
        Cartuser::create($data);
        return redirect()->route('shop.index')
        ->with('success', 'Sản phẩm đã được thêm vào giỏ hàng của bạn');
        }
        else {
            return redirect()->route('shop.index')
        ->with('success', 'Sản phẩm đã có trong giỏ hàng');
        }
        
        // var_dump($cart);
        // die();
       
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, Cartuser $cart)
    {
        $book_quantity = $request->input('book_quantity');
        $book_price = $request->input('product_price');
        $book_id = $request->input('book_id');
        $cart_id = $request->input('cart_id');
        $cart->fill([
            'book_quantity' => $book_quantity,
            'book_price' => $book_price,
            'book_id' => $book_id,
            'cart_id' => $cart_id,
        ])->save();
        // dd($cart);
        return redirect()->route('cart.index')
            ->with('success', 'Cập nhật số lượng sản phẩm thành công');
    }

    public function destroy(Cartuser $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
        ->with('success', 'Product removed from cart successfully');   ;
    }
}