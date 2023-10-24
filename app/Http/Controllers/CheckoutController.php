<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OderDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $cart = $user->cart()->with('products')->get();
        $check = Cart::get();
        $key = 1;
        //tính tổng tiền của giỏ hàng
        $user_id = auth()->user()->id;
        $cartItems = Cart::with('products')->where('user_id', $user_id)->get();
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product_quantity * $cartItem->product_price;
            $totalQuantity += $cartItem->product_quantity ;
        }

        return view('font.cart.checkout',compact('cart'),['totalPrice'=>$totalPrice,'totalQuantity'=>$totalQuantity , 'check'=>$check,
        'key'=>$key]);
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
    public function store(CheckoutRequest $request)
    {
        $name_kh = $request->input('name_kh');
        $diachi = $request->input('diachi');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('note');
        $id_user = $request->input('id_user');
        $data = [
            'name_kh'=>$name_kh,
            'diachi'=>$diachi,
            'phone'=>$phone,
            'email'=>$email,
            'note'=>$note,
            'id_user'=>$id_user,
        ];
        Order::create($data);
        return redirect()->route('cart.index')
        ->with('success', 'Đặt hàng thành công !');
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