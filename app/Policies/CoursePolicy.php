<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Determine if the user can view the course.
     */
    public function view(User $user, Course $course)
    {
        return $user->id === $course->teacher_id ||
            $course->students->contains($user->id) ||
            $user->isAdmin();
    }

    /**
     * Determine if the user can create courses.
     */
    public function create(User $user)
    {
        return $user->isGuru() || $user->isAdmin();
    }

    /**
     * Determine if the user can update the course.
     */
    public function update(User $user, Course $course)
    {
        return $user->id === $course->teacher_id || $user->isAdmin();
    }

    /**
     * Determine if the user can delete the course.
     */
    public function delete(User $user, Course $course)
    {
        return $user->id === $course->teacher_id || $user->isAdmin();
    }
}
