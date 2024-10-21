<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'id',
        'title',
        'description',
        'project_id',
        'priority',
        'status'
    ];

    // accessor
    protected $appends = [
        'created'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
