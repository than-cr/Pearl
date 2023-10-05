<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function color(): HasManyThrough
    {
        return $this->hasManyThrough(Color::class, ProductVariants::class, 'product_id', 'id');
    }

    public function size(): HasManyThrough
    {
        return $this->hasManyThrough(Size::class, ProductVariants::class, 'product_id', 'id');
    }

    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariants::class);
    }

    protected $table = 'products';

    protected $fillable = [
        'name' => '',
        'description' => '',
        'price' => 0,
        'qualification' => 0,
        'reviewers_counter' => 0,
        'image_url' => '',
        'status_id' => '',
        'users_id' => '',
    ];


}
