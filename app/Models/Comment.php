<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';
    use HasFactory;
    protected $fillable = [
        'comment',
        'book_id',
        'user_id',
        'name_user',
    ];
    public function book(){
         return $this->belongsTo(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
   }
}