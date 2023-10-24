<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $table = 'author';
    use HasFactory;
    protected $fillable =[
        'name_author'
    ];
    public function book() 
    {
        return $this->hasMany(Book::class);
    }
}