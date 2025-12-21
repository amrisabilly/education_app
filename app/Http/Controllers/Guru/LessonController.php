<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        $this->authorize('update', $course);

        return view('dashboard.guru.lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'duration_minutes' => 'required|integer|min:1',
        ]);

        $validated['order'] = $course->lessons()->max('order') + 1;

        $course->lessons()->create($validated);

        return redirect()->route('guru.courses.show', $course)
            ->with('success', 'Materi berhasil ditambahkan');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        $this->authorize('update', $course);

        return view('dashboard.guru.lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'duration_minutes' => 'required|integer|min:1',
        ]);

        $lesson->update($validated);

        return redirect()->route('guru.courses.show', $course)
            ->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $this->authorize('update', $course);

        $lesson->delete();

        return redirect()->route('guru.courses.show', $course)
            ->with('success', 'Materi berhasil dihapus');
    }
}
