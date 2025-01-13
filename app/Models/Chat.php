<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';
    protected $primaryKey = 'ChatID';

    protected $fillable = [
        'ChatConnectorID',
        'UserID',
        'CourierID',
        'RestaurantID',
        'MessageListID',
        'MessageTime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, 'CourierID');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'RestaurantID');
    }
    public function chats()
{
    return $this->hasMany(Chat::class, 'ChatConnectorID');
}

}
