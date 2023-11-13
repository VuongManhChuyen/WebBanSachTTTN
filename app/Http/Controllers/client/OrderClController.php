<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderClController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;
        $userOrders = Order::where('user_id', Auth::id())->get();
       if(!$userOrders->isEmpty()){
        $userID = auth()->user()->id;
        $order = Order::join('cart', 'order.cart_id', '=', 'cart.id')
        ->join('cartuser', 'cart.id', '=', 'cartuser.cart_id')
        ->join('book', 'cartuser.book_id', '=', 'book.id')
        ->join('status', 'order.status_id', '=', 'status.id')
        ->select('order.*', 'cart.*', 'cartuser.*', 'book.*', 'status.*','order.id as order_id',)
        ->where('order.user_id', $userID)
        ->get();
             return view('font.order.index',compact('order'));
        }
        else{
                return redirect()->route('shop.index')
            ->with('success', 'Không có đơn đặt hàng ');
            }
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(Order $orders)
    {  
        $orders = Order::where('user_id', Auth::id());
        $orders->delete();
        return redirect()->route('cart.index')
        ->with('success', 'Hủy đơn đặt hàng thành công');
    }
}