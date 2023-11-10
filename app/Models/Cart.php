<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = 'cart';
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];
    public function cartuser() //tạo relationship với model Author
    {
        return $this->hasMany(Cartuser::class);
    }
    public function book()
    {
        return $this->hasMany(Cartuser::class, 'cart_id');
    }
    public function getBy($userId)
    {
        return Cart::whereUserId($userId)->first();
    }

    public function firtOrCreateBy($userId)
    {
        $cart = $this->getBy($userId);

        if (!$cart) {
            $cart = Cart::create(['user_id' => $userId]);
        }
        return $cart;
        
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}