<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'exam_duration',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
