<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        // Check if student is enrolled
        $enrollment = $course->enrollments()->where('student_id', auth()->id())->first();

        if (!$enrollment) {
            return redirect()->route('siswa.courses.browse')
                ->with('error', 'Anda belum terdaftar di kursus ini');
        }

        // Check if lesson is completed by this user
        $isCompleted = $lesson->isCompletedBy(auth()->id());

        // Get next and previous lessons
        $previousLesson = $course->lessons()->where('order', '<', $lesson->order)->orderBy('order', 'desc')->first();
        $nextLesson = $course->lessons()->where('order', '>', $lesson->order)->orderBy('order', 'asc')->first();

        return view('dashboard.siswa.lessons.show', compact('course', 'lesson', 'enrollment', 'previousLesson', 'nextLesson', 'isCompleted'));
    }

    public function complete(Course $course, Lesson $lesson)
    {
        $enrollment = $course->enrollments()->where('student_id', auth()->id())->first();

        if (!$enrollment) {
            return response()->json(['error' => 'Not enrolled'], 403);
        }

        $user = \App\Models\User::find(auth()->id());

        // Check if already completed
        if (!$lesson->isCompletedBy(auth()->id())) {
            // Mark lesson as completed
            $user->completedLessons()->attach($lesson->id, [
                'completed_at' => now()
            ]);

            // Recalculate progress
            $totalLessons = $course->lessons()->count();
            $completedLessons = $user->completedLessons()
                ->whereIn('lesson_id', $course->lessons()->pluck('id'))
                ->count();

            $progress = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;

            $enrollment->update([
                'completed_lessons' => $completedLessons,
                'progress' => $progress,
            ]);

            return response()->json([
                'success' => true,
                'progress' => $progress,
                'completed_lessons' => $completedLessons,
                'total_lessons' => $totalLessons
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Already completed',
            'progress' => $enrollment->progress
        ]);
    }
}
