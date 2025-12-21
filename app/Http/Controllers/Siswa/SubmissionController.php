<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function store(Request $request, Assignment $assignment)
    {
        // Check if student is enrolled in the course
        $enrollment = $assignment->course->enrollments()
            ->where('student_id', auth()->id())
            ->first();

        if (!$enrollment) {
            return back()->with('error', 'Anda belum terdaftar di kursus ini');
        }

        // Check if already submitted
        $existingSubmission = $assignment->submissions()
            ->where('student_id', auth()->id())
            ->first();

        if ($existingSubmission) {
            return back()->with('error', 'Anda sudah mengumpulkan tugas ini');
        }

        $validated = $request->validate([
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240', // 10MB max
        ]);

        $data = [
            'assignment_id' => $assignment->id,
            'student_id' => auth()->id(),
            'content' => $validated['content'],
            'status' => 'submitted',
        ];

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('submissions', 'public');
            $data['file_path'] = $path;
        }

        $assignment->submissions()->create($data);

        return back()->with('success', 'Tugas berhasil dikumpulkan');
    }
}
