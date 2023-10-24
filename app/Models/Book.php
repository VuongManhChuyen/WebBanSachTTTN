<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = "book";
    use HasFactory;
    protected $fillable = [
        'name_book',
        'img',
        'description',
        'price',
        'category_id',
        'author_id',
        'promotion_id',
    ];
    public function category() //tạo relationship với model Category
    {
        return $this->belongsTo(Category::class);
    }
    public function author() //tạo relationship với model Author
    {
        return $this->belongsTo(Author::class);
    }
    public function promotion() //tạo relationship với model Category
    {
        return $this->belongsTo(Promotion::class);
    }
}