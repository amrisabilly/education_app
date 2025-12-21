<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection<User> $children
 * @property-read \Illuminate\Database\Eloquent\Collection<User> $parents
 * @property-read \Illuminate\Database\Eloquent\Collection<Course> $teachingCourses
 * @property-read \Illuminate\Database\Eloquent\Collection<Enrollment> $enrollments
 * @property-read \Illuminate\Database\Eloquent\Collection<Course> $enrolledCourses
 * @property-read \Illuminate\Database\Eloquent\Collection<Submission> $submissions
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'address',
        'photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    // Relationships

    /**
     * Get courses taught by this teacher.
     */
    public function teachingCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    /**
     * Get student enrollments.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    /**
     * Get courses that student is enrolled in.
     */
    public function enrolledCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')
            ->withPivot('status', 'progress', 'enrolled_at', 'completed_at')
            ->withTimestamps();
    }

    /**
     * Get student submissions.
     */
    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

    /**
     * Get children (for parent users).
     */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'student_parents', 'parent_id', 'student_id')
            ->withTimestamps();
    }

    /**
     * Get parents (for student users).
     */
    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'student_parents', 'student_id', 'parent_id')
            ->withTimestamps();
    }

    /**
     * Get completed lessons.
     */
    public function completedLessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'lesson_user')
            ->withTimestamps()
            ->withPivot('completed_at');
    }

    // Helper methods

    /**
     * Check if user is a teacher.
     *
     * @return bool
     */
    public function isGuru(): bool
    {
        return $this->role === 'guru';
    }

    /**
     * Check if user is a student.
     *
     * @return bool
     */
    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }

    /**
     * Check if user is a parent.
     *
     * @return bool
     */
    public function isOrangtua(): bool
    {
        return $this->role === 'orangtua';
    }

    /**
     * Check if user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Get the user's role label.
     *
     * @return string
     */
    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'siswa' => 'Siswa',
            'guru' => 'Guru',
            'orangtua' => 'Orang Tua',
            default => 'Unknown',
        };
    }
}
