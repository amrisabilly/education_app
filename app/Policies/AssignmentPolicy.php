<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\User;

class AssignmentPolicy
{
    public function view(User $user, Assignment $assignment)
    {
        // Teacher can view their own assignments
        return $assignment->course->teacher_id === $user->id;
    }

    public function update(User $user, Assignment $assignment)
    {
        // Only teacher who owns the course can update
        return $assignment->course->teacher_id === $user->id;
    }

    public function delete(User $user, Assignment $assignment)
    {
        // Only teacher who owns the course can delete
        return $assignment->course->teacher_id === $user->id;
    }
}
