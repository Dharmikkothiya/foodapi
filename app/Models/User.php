<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'UserName',
        'Email',
        'PasswordHash',
        'FullName',
        'PhoneNumber',
        'UserBio',
        'UserPhotoURL',
    ];
    public function cartItems()
{
    return $this->hasMany(UserCart::class, 'UserID');
}
public function favoriteFoods()
{
    return $this->hasMany(FavoriteFood::class, 'UserID');
}

public function orders()
{
    return $this->hasMany(Order::class, 'UserID');
}
public function chats()
{
    return $this->hasMany(Chat::class, 'UserID');
}
public function notifications()
{
    return $this->hasMany(Notification::class, 'UserID');
}


}
