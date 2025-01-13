<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $primaryKey = 'FoodID';

    protected $fillable = [
        'Name',
        'Details',
        'Rate',
        'Size',
        'Price',
        'IngredientsListID',
        'CategoryID',
        'RestaurantID',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(FoodCategory::class, 'CategoryID');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'RestaurantID');
    }
    public function cartItems()
{
    return $this->hasMany(UserCart::class, 'FoodID');
}
public function favoriteByUsers()
{
    return $this->hasMany(FavoriteFood::class, 'FoodID');
}
public function orderFoods()
{
    return $this->hasMany(OrderFood::class, 'FoodID');
}

}
