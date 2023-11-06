<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['package_id', 'currency_id', 'start_date', 'end_date', 'days', 'adult_amount', 'adult_count', 'children_amount', 'children_count', 'sub_total', 'discount_total', 'total', 'notes'];   

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }  
    
    public function latestTransaction(): HasOne
    {
        return $this->hasOne(Transaction::class)->latestOfMany();
    }
}
