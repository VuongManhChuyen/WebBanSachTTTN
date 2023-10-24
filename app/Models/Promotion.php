<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $table='promotion';
    use HasFactory;
    protected $fillable = [
        'price_promotion',
    ];
    public function book() 
    {
        return $this->hasMany(Book::class);
    }
}