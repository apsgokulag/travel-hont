<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['package_id', 'currency_id', 'adult_amount', 'children_amount'];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function currency(): HasOne
    {
        return $this->hasOne(Currency::class);
    }
}
