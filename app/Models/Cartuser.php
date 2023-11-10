<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cartuser extends Model
{
    public $table = "cartuser";
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'book_id',
        'book_quantity',
        'book_price',
    ];
    public static function isBookInCart($cart_id,$book_id)
    {
        return self::where('cart_id', $cart_id)
                   ->where('book_id', $book_id)
                   ->exists();
    // return CartProduct::whereCartId($cartId)
    //         ->whereProductId($productId)
    //         ->whereProductSize($productSize)->first();
    }
    public function getBy(  $userId)
    {
       return Cart::whereUserId($userId)->first();
    }
    public function getBy1(  $bookId)
    {

       return Cart::whereBookId($bookId)->first();
    }
    public function book() 
    {
        return $this->belongsTo(Book::class);
    }
    public function cart() 
    {
        return $this->belongsTo(Cart::class);
    }
    public static function isProductInCart($book_id, $cart_id,$userId)
    {
        // return self::where('book_id', $book_id)
        //            ->where('cart_id', $cart_id)
        //            ->where('user_id',$userId)
        //            ->exists();
        return DB::table('cart')
        ->join('cartuser', 'cart.id','=','cartuser.cart_id')
        ->where('cartuser.cart_id',$cart_id)
        ->where('cartuser.book_id', $book_id)
        ->where('cart.user_id', $userId)
        ->get();







    }
}