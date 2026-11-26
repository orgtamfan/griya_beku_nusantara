<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'weight_gram',
        'stock',
        'description',
        'image',
    ];

    /**
     * Attribute casting.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'weight_gram' => 'integer',
            'stock' => 'integer',
        ];
    }

    /**
     * A product belongs to one category (inverse One-to-Many).
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Full public URL for the product's photo on the "public" disk.
     */
    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image);
    }

    /**
     * Price formatted as Indonesian Rupiah, e.g. "Rp45.000".
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp'.number_format((float) $this->price, 0, ',', '.');
    }

    /**
     * Whether the product is still in stock.
     */
    public function getInStockAttribute(): bool
    {
        return $this->stock > 0;
    }
}
