<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'products';

    protected $fillable = [
        'name' => '',
        'description' => '',
        'price' => 0,
        'qualification' => 0,
        'reviewers_counter' => 0,
        'image_url' => '',
        'stock_quantity' => 0
    ];

}
