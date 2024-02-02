<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'food_id', 'order_by', 'order_to', 'quantity', 'total_price'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'food_id');
    }

    public function orderedBy()
    {
        return $this->belongsTo(User::class, 'order_by');
    }

    public function orderedTo()
    {
        return $this->belongsTo(User::class, 'order_to');
    }
}
