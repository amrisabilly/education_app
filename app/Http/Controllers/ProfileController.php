<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function show()
    {
        $userId = auth()->id();
        $user = \App\Models\User::find($userId);

        // Load additional data based on role
        switch ($user->role) {
            case 'guru':
                $user->load(['teachingCourses.students', 'teachingCourses.lessons']);
                $totalStudents = 0;
                $totalLessons = 0;

                foreach ($user->teachingCourses as $course) {
                    $totalStudents += $course->students->count();
                    $totalLessons += $course->lessons->count();
                }

                $stats = [
                    'total_courses' => $user->teachingCourses->count(),
                    'total_students' => $totalStudents,
                    'total_lessons' => $totalLessons,
                ];
                break;

            case 'siswa':
                $user->load(['enrollments.course', 'submissions']);
                $stats = [
                    'total_courses' => $user->enrollments->count(),
                    'completed_courses' => $user->enrollments->where('status', 'completed')->count(),
                    'total_submissions' => $user->submissions->count(),
                    'avg_progress' => round($user->enrollments->avg('progress') ?? 0, 2),
                ];
                break;

            case 'orangtua':
                $user->load(['children.enrollments']);
                $totalCourses = 0;

                foreach ($user->children as $child) {
                    $totalCourses += $child->enrollments->count();
                }

                $stats = [
                    'total_children' => $user->children->count(),
                    'total_courses' => $totalCourses,
                ];
                break;

            default:
                $stats = [];
        }

        return view('dashboard.profile.show', compact('user', 'stats'));
    }

    public function edit()
    {
        $user = \App\Models\User::find(auth()->id());
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = \App\Models\User::find(auth()->id());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $validated['photo'] = $request->file('photo')->store('profiles', 'public');
        }

        $user->update($validated);

        return redirect()->route('profile.show')->with('success', 'Profile berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = \App\Models\User::find(auth()->id());

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.show')->with('success', 'Password berhasil diubah!');
    }
}
