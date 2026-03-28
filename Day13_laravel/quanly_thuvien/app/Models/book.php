<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model // Phải là Book (số ít, viết hoa)
{
    use HasFactory;
    
    protected $fillable = ['title', 'author', 'price', 'stock', 'img', 'description'];
}