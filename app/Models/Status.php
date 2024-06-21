<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'order'];

    public $timestamps = false;

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
