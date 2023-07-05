<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'year',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'skill_sets',
            'candidate_id',
            'skill_id'
        );
    }

    public function jobs()
    {
        return $this->belongsTo(
            Job::class,
            'job_id',
            'id'
        );
    }
}
