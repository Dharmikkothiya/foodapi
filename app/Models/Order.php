<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'OrderID';

    protected $fillable = [
        'UserID',
        'RestaurantID',
        'AddressID',
        'CourierID',
        'TotalPrice',
        'DeliveryTime',
        'DeliveryPrice',
        'ExpectedTime',
        'OrderStatus',
        'OrderedAt',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'RestaurantID');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'AddressID');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'CourierID');
    }
    public function orderFoods()
{
    return $this->hasMany(OrderFood::class, 'OrderID');
}

}
