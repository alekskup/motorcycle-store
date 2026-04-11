<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorcycle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id', 'name', 'slug', 'year', 'price', 'currency', 'status', 'description'
    ];

    protected $casts = [
        'price' => 'integer',
        'year'  => 'integer',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopePriceBetween($query, ?int $min, ?int $max)
    {
        if ($min !== null) $query->where('price', '>=', $min);

        if ($max !== null) $query->where('price', '<=', $max);

        return $query;
    }
}
