<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Book;
use App\Models\User;
use App\Models\Cartuser;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $cart;
    protected $book;
    protected $cartuser;
    protected $order;
    public function __construct(Book $book, Cart $cart, Cartuser $cartuser, Order $order)
    {
        $this->book = $book;
        $this->cart = $cart;
        $this->cartuser = $cartuser;
        $this->order = $order;
    }
    public function index()
    {
        $order = Order::join('cart', 'order.cart_id', '=', 'cart.id')
        ->join('cartuser', 'cart.id', '=', 'cartuser.cart_id')
        ->join('book', 'cartuser.book_id', '=', 'book.id')
        ->join('status', 'order.status_id', '=', 'status.id')
        ->select('order.*', 'cart.*', 'cartuser.*', 'book.*', 'status.*','order.id as order_id',)
        ->get();;
    return view('admin.order.list',compact('order'));
    }
    public function create()
    {
      
    }
    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
   
    }
    public function edit(Order $order)
    {
        $status = Status::get();
        $cart = Cart::get();
        $user = User::get();
        $order->load('status','cart','user');
        // dd($order);
        return view('admin.order.edit',compact('order'),['status' => $status , 'cart' => $cart , 'user' => $user]);
    }

    public function update(Request $request, Order $order, Cart $cart)
    {
        $name_kh = $request->input('name_kh');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $note = $request->input('promotion_id');
        $status_id = $request->input('status_id');
        $cart_id = $request->input('cart_id');
        $user_id = $request->input('user_id');
        
        $order->fill([
            'name_kh' => $name_kh,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'note' => $note,
            'status_id' => $status_id,
            'cart_id' => $cart_id,
            'user_id' => $user_id,
            ])->save();
            $cart->fill([
                'status_id' => $status_id,
                'user_id' => $user_id,
            ])->save( );
            return redirect()->route('order.index')
            ->with('success', 'Order update successfully');
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')
        ->with('success', 'Order delete  successfully');
    }
}