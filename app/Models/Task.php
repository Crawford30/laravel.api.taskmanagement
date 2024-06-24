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
        'project_id',
        'task_name',
        'description',
        'task_priority',
        'task_color',
        'start_date',
        'end_date',
        'members',
        'tags',
        'user_id',
        'order',
        'status_id'
    ];


    protected $casts = [
        'members' => 'array',
        'tags' => 'array',

    ];

    // protected $hidden = [
    //     'members',
    //     'tags',
    // ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }


    public function project()
    {
        return $this->belongsTo(Project::class, "project_id", "id");
    }
}
