<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    public function dashboard()
    {
        $courses = Course::where('teacher_id', auth()->id())
            ->withCount(['students', 'lessons'])
            ->latest()
            ->get();

        $totalStudents = $courses->sum('students_count');
        $totalCourses = $courses->count();

        $pendingSubmissions = Submission::whereHas('assignment.course', function ($q) {
            $q->where('teacher_id', auth()->id());
        })->where('status', 'submitted')->count();

        return view('dashboard.guru.index', compact('courses', 'totalStudents', 'totalCourses', 'pendingSubmissions'));
    }

    public function courses()
    {
        $courses = Course::where('teacher_id', auth()->id())
            ->withCount('students')
            ->latest()
            ->paginate(10);

        return view('dashboard.guru.courses.index', compact('courses'));
    }

    public function createCourse()
    {
        return view('dashboard.guru.courses.create');
    }

    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced',
            'status' => 'required|in:draft,published,archived',
            'duration_hours' => 'required|integer|min:1',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['teacher_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        Course::create($validated);

        return redirect()->route('guru.courses')->with('success', 'Course berhasil dibuat!');
    }

    public function editCourse(Course $course)
    {
        $this->authorize('update', $course);
        return view('dashboard.guru.courses.edit', compact('course'));
    }

    public function updateCourse(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|in:beginner,intermediate,advanced',
            'status' => 'required|in:draft,published,archived',
            'duration_hours' => 'required|integer|min:1',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        $course->update($validated);

        return redirect()->route('guru.courses')->with('success', 'Course berhasil diupdate!');
    }

    public function deleteCourse(Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();

        return redirect()->route('guru.courses')->with('success', 'Course berhasil dihapus!');
    }

    public function togglePublish(Course $course)
    {
        $this->authorize('update', $course);

        $newStatus = $course->status === 'published' ? 'draft' : 'published';
        $course->update(['status' => $newStatus]);

        $message = $newStatus === 'published'
            ? 'Kursus berhasil dipublish! Sekarang siswa dapat melihat kursus ini.'
            : 'Kursus berhasil diubah menjadi draft.';

        return back()->with('success', $message);
    }

    public function showCourse(Course $course)
    {
        $this->authorize('view', $course);
        $course->load(['lessons', 'students', 'assignments']);

        return view('dashboard.guru.courses.show', compact('course'));
    }

    // Assignment Management
    public function assignments()
    {
        $assignments = Assignment::whereHas('course', function ($q) {
            $q->where('teacher_id', auth()->id());
        })->with('course')->latest()->paginate(10);

        return view('dashboard.guru.assignments.index', compact('assignments'));
    }

    public function gradeSubmission(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'score' => 'required|integer|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        $submission->update([
            'score' => $validated['score'],
            'feedback' => $validated['feedback'],
            'status' => 'graded',
            'graded_at' => now(),
        ]);

        return back()->with('success', 'Submission berhasil dinilai!');
    }
}
