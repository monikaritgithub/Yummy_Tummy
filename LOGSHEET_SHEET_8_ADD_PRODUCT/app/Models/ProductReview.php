<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = ['food_id', 'review'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'food_id');
    }
}
