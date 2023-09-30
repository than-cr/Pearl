<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    protected $table = 'products';

    protected $fillable = [
        'name' => '',
        'description' => '',
        'price' => 0,
        'qualification' => 0,
        'reviewers_counter' => 0,
        'image_url' => '',
        'stock_quantity' => 0,
        'types_id' => '',
        'users_id' => '',
    ];


}
