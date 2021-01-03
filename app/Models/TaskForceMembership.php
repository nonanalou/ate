<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskForceMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_force_id'
    ];

    public function taskforce()
    {
        return $this->belongsTo(TaskForce::class, 'task_force_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
