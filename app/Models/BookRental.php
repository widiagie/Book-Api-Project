<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRental extends Model
{
    use HasFactory;
    protected $table = 'book_rental';
    protected $fillable = ['user_id', 'book_id', 'rent', 'updated_by'];
}
