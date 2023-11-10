<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = 'status';
    use HasFactory;
    protected $fillable = [
    'name_status',
    ];
    public function oder() //tạo relationship với model Category
    {
        return $this->hasMany(Order::class);
    }
}