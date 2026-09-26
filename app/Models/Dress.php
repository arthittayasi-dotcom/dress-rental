<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dress extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'size',
        'type',
        'price_per_day',
        'status',
        'image',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'price_per_day' => 'decimal:2',
        ];
    }

    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }
}