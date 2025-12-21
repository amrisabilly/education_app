<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $enrollments = Enrollment::where('student_id', auth()->id())
            ->with('course.teacher')
            ->latest()
            ->take(5)
            ->get();

        $totalCourses = Enrollment::where('student_id', auth()->id())->count();
        $completedCourses = Enrollment::where('student_id', auth()->id())
            ->where('status', 'completed')
            ->count();

        $pendingAssignments = Assignment::whereHas('course.enrollments', function ($q) {
            $q->where('student_id', auth()->id());
        })->whereDoesntHave('submissions', function ($q) {
            $q->where('student_id', auth()->id());
        })->count();

        // Get available courses (published and not enrolled)
        $availableCourses = Course::where('status', 'published')
            ->whereDoesntHave('enrollments', function ($q) {
                $q->where('student_id', auth()->id());
            })
            ->with('teacher')
            ->withCount('students')
            ->latest()
            ->take(6)
            ->get();

        return view('dashboard.siswa.index', compact('enrollments', 'totalCourses', 'completedCourses', 'pendingAssignments', 'availableCourses'));
    }

    public function courses()
    {
        $enrolledCourses = Course::whereHas('enrollments', function ($q) {
            $q->where('student_id', auth()->id());
        })->with('teacher')->paginate(9);

        return view('dashboard.siswa.courses.index', compact('enrolledCourses'));
    }

    public function browseCourses()
    {
        // Get ALL courses for debugging (regardless of status)
        $allCoursesDebug = Course::with('teacher')->get();

        // Get all published courses, including already enrolled ones (for debugging)
        $allCourses = Course::where('status', 'published')
            ->with('teacher')
            ->withCount('students')
            ->latest()
            ->paginate(12);

        // Get courses not yet enrolled
        $courses = Course::where('status', 'published')
            ->whereDoesntHave('enrollments', function ($q) {
                $q->where('student_id', auth()->id());
            })
            ->with('teacher')
            ->withCount('students')
            ->latest()
            ->paginate(12);

        return view('dashboard.siswa.courses.browse', compact('courses', 'allCourses', 'allCoursesDebug'));
    }

    public function enrollCourse(Course $course)
    {
        if ($course->status !== 'published') {
            return back()->with('error', 'Course tidak tersedia untuk enrollment.');
        }

        $existing = Enrollment::where('student_id', auth()->id())
            ->where('course_id', $course->id)
            ->first();

        if ($existing) {
            return back()->with('error', 'Anda sudah terdaftar di course ini.');
        }

        Enrollment::create([
            'student_id' => auth()->id(),
            'course_id' => $course->id,
            'status' => 'active',
            'progress' => 0,
        ]);

        return redirect()->route('siswa.courses')->with('success', 'Berhasil mendaftar ke course!');
    }

    public function showCourse(Course $course)
    {
        $enrollment = Enrollment::where('student_id', auth()->id())
            ->where('course_id', $course->id)
            ->firstOrFail();

        $course->load(['lessons', 'assignments']);

        return view('dashboard.siswa.courses.show', compact('course', 'enrollment'));
    }

    public function assignments()
    {
        $assignments = Assignment::whereHas('course.enrollments', function ($q) {
            $q->where('student_id', auth()->id());
        })->with(['course', 'submissions' => function ($q) {
            $q->where('student_id', auth()->id());
        }])->latest()->paginate(10);

        return view('dashboard.siswa.assignments.index', compact('assignments'));
    }

    public function submitAssignment(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'file' => 'nullable|file|max:5120',
        ]);

        $data = [
            'assignment_id' => $assignment->id,
            'student_id' => auth()->id(),
            'content' => $validated['content'],
            'status' => 'submitted',
        ];

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('submissions', 'public');
        }

        Submission::create($data);

        return back()->with('success', 'Assignment berhasil dikumpulkan!');
    }
}
