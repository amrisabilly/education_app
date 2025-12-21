<?php

namespace App\Http\Controllers\Orangtua;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentParent;
use App\Models\Enrollment;
use App\Models\Submission;
use Illuminate\Http\Request;

class OrangtuaController extends Controller
{
    public function dashboard()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $children = $user->children()
            ->withCount('enrollments')
            ->get();

        $totalChildren = $children->count();
        $totalEnrollments = $children->sum('enrollments_count');

        return view('dashboard.orangtua.index', compact('children', 'totalChildren', 'totalEnrollments'));
    }

    public function children()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $children = $user->children()
            ->withCount('enrollments')
            ->paginate(10);

        return view('dashboard.orangtua.children.index', compact('children'));
    }

    public function linkChild(Request $request)
    {
        $validated = $request->validate([
            'student_email' => 'required|email|exists:users,email',
        ]);

        $student = User::where('email', $validated['student_email'])
            ->where('role', 'siswa')
            ->first();

        if (!$student) {
            return back()->with('error', 'Siswa tidak ditemukan.');
        }

        $existing = StudentParent::where('parent_id', auth()->id())
            ->where('student_id', $student->id)
            ->first();

        if ($existing) {
            return back()->with('error', 'Siswa sudah terhubung dengan akun Anda.');
        }

        StudentParent::create([
            'parent_id' => auth()->id(),
            'student_id' => $student->id,
        ]);

        return back()->with('success', 'Berhasil menghubungkan dengan siswa!');
    }

    public function showChildProgress($childId)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $child = $user->children()->findOrFail($childId);

        $enrollments = Enrollment::where('student_id', $child->id)
            ->with('course.teacher')
            ->get();

        $submissions = Submission::where('student_id', $child->id)
            ->with('assignment.course')
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard.orangtua.children.progress', compact('child', 'enrollments', 'submissions'));
    }

    public function showChildCourses($childId)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $child = $user->children()->findOrFail($childId);

        $enrollments = Enrollment::where('student_id', $child->id)
            ->with('course.teacher')
            ->latest()
            ->paginate(10);

        return view('dashboard.orangtua.children.courses', compact('child', 'enrollments'));
    }
}
