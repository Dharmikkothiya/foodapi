<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{use HasFactory;

    protected $table = 'restaurants';
    protected $primaryKey = 'RestaurantID';

    protected $fillable = [
        'Name',
        'Intro',
        'Rate',
        'PhotosURL',
        'AddressID',
    ];
    public function address()
{
    return $this->belongsTo(Address::class, 'AddressID');
}
public function foods()
{
    return $this->hasMany(Food::class, 'RestaurantID');
}
public function orders()
{
    return $this->hasMany(Order::class, 'RestaurantID');
}
public function chats()
{
    return $this->hasMany(Chat::class, 'RestaurantID');
}

}
