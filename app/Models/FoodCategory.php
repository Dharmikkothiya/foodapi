<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $table = 'food_categories';
    protected $primaryKey = 'CategoryID';

    protected $fillable = [
        'Name',
        'RestaurantID',
    ];

    // Define relationship to Restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'RestaurantID');
    }
    public function foodCategories()
{
    return $this->hasMany(FoodCategory::class, 'RestaurantID');
}
public function foods()
{
    return $this->hasMany(Food::class, 'CategoryID');
}

}
