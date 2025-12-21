<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'content',
        'video_url',
        'order',
        'duration_minutes',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function completedByUsers()
    {
        return $this->belongsToMany(User::class, 'lesson_user')
            ->withTimestamps()
            ->withPivot('completed_at');
    }

    public function isCompletedBy($userId)
    {
        return $this->completedByUsers()->where('user_id', $userId)->exists();
    }
}
