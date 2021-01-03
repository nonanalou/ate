<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskForce extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function projects()
    {
        return $this->hasMany(Project::class, 'owner_taskforce_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'task_force_memberships', 'task_force_id', 'user_id');
    }
}
