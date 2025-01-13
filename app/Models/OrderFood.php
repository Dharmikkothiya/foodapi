<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;

    protected $table = 'order_foods';
    protected $primaryKey = 'OrderFoodID';

    protected $fillable = [
        'OrderID',
        'FoodID',
        'Quantity',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class, 'OrderID');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'FoodID');
    }
}
