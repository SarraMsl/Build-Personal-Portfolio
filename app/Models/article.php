<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'article'; // Assuming the table name is 'articles'

    protected $fillable = [
        'name',
        'qantity',
        'price',
        'stock',
        'image',
    ];

    // Add any relationships or additional methods as needed
}
