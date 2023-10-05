<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';

    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariants::class);
    }

    protected $fillable = [
        'name' => ''
    ];
}
