<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'chief_id',
        'food_name',
        'food_image',
        'food_descriptions',
        'ingredients',
        'is_available',
        'category_tag',
        'quantity_available',
        'food_price',
    ];

    // Define the relationship to the User model (chief_id references users.id)
    public function user()
    {
        return $this->belongsTo(User::class, 'chief_id');
    }
}
