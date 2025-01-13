<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;

    protected $table = 'user_carts';
    protected $primaryKey = 'CartID';

    protected $fillable = [
        'UserID',
        'FoodID',
        'OrderCount',
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
