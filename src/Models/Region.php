<?php

namespace Xpeedstudio\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name'
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}
