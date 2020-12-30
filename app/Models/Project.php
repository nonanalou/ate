<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'shortDescription',
        'owner_taskforce_id'
    ];

    public function owner()
    {
        return $this->belongsTo(TaskForce::class, 'owner_taskforce_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'project_id');
    }
}
