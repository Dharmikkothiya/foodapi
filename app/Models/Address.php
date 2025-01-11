<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey = 'AddressID';
    protected $fillable = [
        'UserID',
        'AddressTag',
        'Address',
        'Street',
        'Pincode',
        'Apartment',
        'MapLocationData',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
