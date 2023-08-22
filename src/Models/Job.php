<?php

namespace Xpeedstudio\Hr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'min_salary',
        'max_salary'
    ];

    public function jobHistories()
    {
        return $this->hasMany(JobHistory::class);
    }
    
}
