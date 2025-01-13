<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    protected $table = 'couriers';
    protected $primaryKey = 'CourierID';

    protected $fillable = [
        'Name',
        'ProfilePhotoURL',
        'PhoneNumber',
        'ChatID',
    ];

    // Relationships
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'ChatID');
    }
    public function orders()
{
    return $this->hasMany(Order::class, 'CourierID');
}
public function chats()
{
    return $this->hasMany(Chat::class, 'CourierID');
}

}
