<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

  // 'task_name',
            // 'description',
            // 'task_priority',
            // 'start_date',
            // 'end_date',
            // 'order',
            // 'members',
            // 'user_id',
            // 'status_id'

    protected $fillable = [
        'task_name',
        'description',
        'task_priority',
        'start_date',
        'end_date',
        'members',
        'user_id',
        'order',
        'status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
