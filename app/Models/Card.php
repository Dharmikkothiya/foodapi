<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';
    protected $primaryKey = 'CardID';

    protected $fillable = [
        'CardTagType',
        'UserID',
        'CardHolderName',
        'CardNumber',
        'ExpireDate',
        'CVC',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
    public function cards()
{
    return $this->hasMany(Card::class, 'UserID');
}

}
