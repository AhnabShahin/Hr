<?php

namespace Xpeedstudio\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['department_name', 'location_id','manager_id'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function jobHistories()
    {
        return $this->hasMany(JobHistory::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
