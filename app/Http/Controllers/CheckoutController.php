<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cartuser;
use App\Models\Book;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
class CheckoutController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $check = Cart::get();
        $key = 1;
        //tính tổng tiền của giỏ hàng
        $user_id = auth()->user()->id;
        $cart = Cart::with('cartuser.book')->where('user_id', $user_id)->first();
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($cart->cartuser as $cartItem) {
            $totalPrice += $cartItem->book_quantity * $cartItem->book_price;
            $totalQuantity += $cartItem->book_quantity ;
        }
        $id_cart = Cart::where('user_id', $user_id)->get();
        foreach ($id_cart as $cartItem) {
            $cart_id = $cartItem->id;
        }
        return view('font.cart.checkout',compact('cart'),['totalPrice'=>$totalPrice,'totalQuantity'=>$totalQuantity , 'check'=>$check,
        'key'=>$key , 'cart_id'=>$cart_id]);
    }

    public function create()
    {
    }

    public function store(CheckoutRequest $request)
    {
        $name_kh = $request->input('name_kh');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('note');
        $user_id = $request->input('user_id');
        $cart_id = $request->input('cart_id');
        $status_id = $request->input('status_id');
        $data = [
            'name_kh'=>$name_kh,
            'address'=>$address,
            'phone'=>$phone,
            'email'=>$email,
            'note'=>$note,
            'user_id'=>$user_id,
            'cart_id'=>$cart_id,
            'status_id'=>$status_id,
        ];
        Order::create($data);
        return redirect()->route('cart.index')
        ->with('success', 'Đặt hàng thành công !');
    }

    public function show(string $id)
    {
    }


    public function edit(string $id)
    {
    }


    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
    }
}