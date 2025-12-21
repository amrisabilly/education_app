<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::whereHas('course', function ($query) {
            $query->where('teacher_id', auth()->id());
        })->with(['course', 'submissions'])->latest()->paginate(10);

        $pendingSubmissions = Submission::whereHas('assignment.course', function ($query) {
            $query->where('teacher_id', auth()->id());
        })->where('status', 'submitted')->count();

        return view('dashboard.guru.assignments.index', compact('assignments', 'pendingSubmissions'));
    }

    public function create(Course $course)
    {
        $this->authorize('update', $course);

        return view('dashboard.guru.assignments.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after:now',
            'max_score' => 'required|integer|min:1|max:100',
        ]);

        $course->assignments()->create($validated);

        return redirect()->route('guru.courses.show', $course)
            ->with('success', 'Tugas berhasil ditambahkan');
    }

    public function show(Assignment $assignment)
    {
        $this->authorize('view', $assignment);

        $assignment->load(['course', 'submissions.student']);

        return view('dashboard.guru.assignments.show', compact('assignment'));
    }

    public function grade(Request $request, Assignment $assignment, Submission $submission)
    {
        $this->authorize('update', $assignment);

        $validated = $request->validate([
            'score' => 'required|integer|min:0|max:' . $assignment->max_score,
            'feedback' => 'nullable|string',
        ]);

        $submission->update([
            'score' => $validated['score'],
            'feedback' => $validated['feedback'],
            'status' => 'graded',
            'graded_at' => now(),
        ]);

        return back()->with('success', 'Tugas berhasil dinilai');
    }

    public function edit(Course $course, Assignment $assignment)
    {
        $this->authorize('update', $course);

        return view('dashboard.guru.assignments.edit', compact('course', 'assignment'));
    }

    public function update(Request $request, Course $course, Assignment $assignment)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'max_score' => 'required|integer|min:1|max:100',
        ]);

        $assignment->update($validated);

        return redirect()->route('guru.courses.show', $course)
            ->with('success', 'Tugas berhasil diperbarui');
    }

    public function destroy(Course $course, Assignment $assignment)
    {
        $this->authorize('update', $course);

        $assignment->delete();

        return redirect()->route('guru.courses.show', $course)
            ->with('success', 'Tugas berhasil dihapus');
    }
}
