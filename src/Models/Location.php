<?php

namespace Xpeedstudio\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'street_address',
        'postal_code',
        'city',
        'state_province',
        'country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
