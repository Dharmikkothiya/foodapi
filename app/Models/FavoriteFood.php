<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteFood extends Model
{
    use HasFactory;

    protected $table = 'favorite_foods';
    protected $primaryKey = 'FavoriteFoodListID';

    protected $fillable = [
        'UserID',
        'FoodID',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'FoodID');
    }
}
