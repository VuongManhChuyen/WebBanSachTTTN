<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'order';
    use HasFactory;
    protected $fillable = [
        
        'name_kh',
        'address',
        'phone',    
        'email',
        'note',
        'status_id',
        'user_id',
        'cart_id',
    ];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function cartuser()
    {
        return $this->belongsTo(Cartuser::class);
    }
}