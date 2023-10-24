<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        $cart = $user->cart()->with('products')->get();
        $check = Cart::get();
        $check_id = '';
        foreach ($check as $check){
            $check_id = $check->user_id;
        }

        //tính tổng tiền của giỏ hàng
        $user_id = auth()->user()->id;
        $cartItems = Cart::with('products')->where('user_id', $user_id)->get();
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product_quantity * $cartItem->product_price;
            $totalQuantity += $cartItem->product_quantity ;
        }

        return view('font.cart.index', compact('cart'),['check_id' => $check_id,'totalPrice' => $totalPrice , 'totalQuantity' => $totalQuantity]);
          
    }
    public function getTotalQuantity()
    {
        $user = Auth::user();
        $cart = $user->cart()->get();
        
        return view('font.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $product_id = $request->product_id;
        if (!Cart::isProductInCart($user_id,$product_id)) {
            $product_id =$request->product_id;
            $product_price =$request->product_price;
            $user_id = $request->user_id;
            $product_quantity =$request->product_quantity;
        $data=[
                    
                    'product_id' => $product_id,
                    'product_price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'user_id' =>$user_id,
              
           
        ];
        Cart::create($data);
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
    public function update(Request $request, Cart $cart)
    {
        $product_quantity = $request->input('product_quantity');
        $product_price = $request->input('product_price');
        $product_id = $request->input('product_id');
        $user_id = $request->input('user_id');
        $cart->fill([
            'product_quantity' => $product_quantity,
            'product_price' => $product_price,
            'user_id' => $user_id,
            'product_id' => $product_id,
        ])->save();
        // dd($cart);
        return redirect()->route('cart.index')
            ->with('success', 'Cập nhật số lượng sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
        ->with('success', 'Product removed from cart successfully');   ;
    }
}