<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteModel extends Model
{
    use HasFactory;
    protected $table = "quote";
    protected $fillable = [
        'content',
        'length',
        'author',
    ];
}
