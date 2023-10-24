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
    public function users() //tạo relationship với model Author
    {
        return $this->belongsTo(User::class);
    }
}