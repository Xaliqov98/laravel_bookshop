<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'book', 'code', 'page', 'stock', 'publish_id', 'binding', 'price', 'r_price', 'buy_price', 'about', 'language', 'author_id', 'category_id', 'seller_id', 'image'
    ];
}
