<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'project_id',
        'category_id',
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

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }


    public function project()
    {
        return $this->belongsTo(Project::class, "project_id", "id");
    }
}
