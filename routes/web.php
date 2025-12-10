<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Landing Page Routes
Route::get('/', function () {
    return view('landing.home.index');
})->name('landing');

// Auth Routes
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login.page');
    Route::post('login', [AuthController::class, 'handleLogin'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register', [AuthController::class, 'showRegister'])->name('register.page');
// ...
});

// Dashboard Routes (Student) - Protected by middleware
Route::prefix('dashboard/student')->name('student.')->middleware('auth.session')->group(function () {
    Route::get('/', function () {
        $user = session('user');
        $modules = [
            [
                'id' => 1,
                'title' => 'Modul 1: Pengenalan Aljabar',
                'status' => 'completed', // completed, in_progress, locked
                'progress' => 100,
                'lessons' => 8,
                'completedLessons' => 8,
                'points' => 250
            ],
            [
                'id' => 2,
                'title' => 'Modul 2: Aljabar Dasar',
                'status' => 'in_progress',
                'progress' => 60,
                'lessons' => 10,
                'completedLessons' => 6,
                'points' => 150
            ],
            [
                'id' => 3,
                'title' => 'Modul 3: Persamaan Linear',
                'status' => 'locked',
                'progress' => 0,
                'lessons' => 12,
                'completedLessons' => 0,
                'points' => 0
            ],
            [
                'id' => 4,
                'title' => 'Modul 4: Sistem Persamaan',
                'status' => 'locked',
                'progress' => 0,
                'lessons' => 10,
                'completedLessons' => 0,
                'points' => 0
            ],
        ];
        
        return view('dashboard.student.index', ['user' => $user, 'modules' => $modules]);
    })->name('index');
    
    Route::get('module/{id}', function ($id) {
        $user = session('user');
        $lessons = [
            ['id' => 1, 'title' => 'Pengenalan Konsep', 'status' => 'completed', 'duration' => '15 menit'],
            ['id' => 2, 'title' => 'Variabel dan Konstanta', 'status' => 'completed', 'duration' => '20 menit'],
            ['id' => 3, 'title' => 'Operasi Aljabar', 'status' => 'in_progress', 'duration' => '25 menit'],
            ['id' => 4, 'title' => 'Soal Latihan', 'status' => 'locked', 'duration' => '30 menit'],
            ['id' => 5, 'title' => 'Quiz', 'status' => 'locked', 'duration' => '20 menit'],
        ];
        
        $moduleData = [
            'id' => $id,
            'title' => 'Modul ' . $id . ': Aljabar Dasar',
            'description' => 'Pelajari dasar-dasar aljabar dengan konsep variabel, konstanta, dan operasi aljabar.',
            'progress' => 60,
            'lessons' => $lessons,
            'resources' => [
                ['type' => 'slide', 'title' => 'Slide Pembelajaran', 'link' => '#'],
                ['type' => 'exercise', 'title' => 'Soal Latihan', 'link' => '#'],
                ['type' => 'video', 'title' => 'Video Tutorial', 'link' => '#'],
            ]
        ];
        
        return view('dashboard.student.module-detail', ['moduleId' => $id, 'user' => $user, 'module' => $moduleData]);
    })->name('module.show');
    
    Route::get('module/{id}/quiz', function ($id) {
        $user = session('user');
        $quizData = [
            'id' => $id,
            'title' => 'Kuis Modul ' . $id . ': Aljabar Dasar',
            'description' => 'Uji pemahaman Anda tentang materi yang telah dipelajari',
            'totalQuestions' => 5,
            'timeLimit' => 900, // dalam detik
            'passingScore' => 70,
        ];
        
        return view('dashboard.student.quiz', ['moduleId' => $id, 'user' => $user, 'quiz' => $quizData]);
    })->name('module.quiz');
    
    Route::post('module/{id}/quiz/submit', function ($id) {
        $user = session('user');
        $answers = request('answers', []);
        
        // Simulasi perhitungan skor
        $correctAnswers = [1 => 'C', 2 => 'C', 3 => 'B', 4 => 'A', 5 => 'D'];
        $userScore = 0;
        
        foreach ($answers as $questionId => $userAnswer) {
            if (isset($correctAnswers[$questionId]) && $correctAnswers[$questionId] === $userAnswer) {
                $userScore += 20; // Setiap soal bernilai 20 poin
            }
        }
        
        $results = [
            'score' => $userScore,
            'totalQuestions' => 5,
            'correctAnswers' => count(array_filter($answers, function($answer, $qId) use ($correctAnswers) {
                return isset($correctAnswers[$qId]) && $correctAnswers[$qId] === $answer;
            }, ARRAY_FILTER_USE_BOTH)),
            'wrongAnswers' => 5 - count(array_filter($answers, function($answer, $qId) use ($correctAnswers) {
                return isset($correctAnswers[$qId]) && $correctAnswers[$qId] === $answer;
            }, ARRAY_FILTER_USE_BOTH)),
            'passed' => $userScore >= 70,
            'answers' => $answers,
            'correctAnswers' => $correctAnswers
        ];
        
        return view('dashboard.student.quiz-result', ['moduleId' => $id, 'user' => $user, 'results' => $results]);
    })->name('module.quiz.submit');
    
    Route::get('module/{id}/quiz/result', function ($id) {
        $user = session('user');
        return view('dashboard.student.quiz-result', ['moduleId' => $id, 'user' => $user]);
    })->name('module.quiz-result');
});

// Dashboard Routes (Teacher)
Route::prefix('dashboard/teacher')->name('teacher.')->middleware('auth.session')->group(function () {
    Route::get('/', function () {
        $user = session('user');
        return view('dashboard.teacher.index', ['user' => $user]);
    })->name('index');
});

// Dashboard Routes (Parent)
Route::prefix('dashboard/parent')->name('parent.')->middleware('auth.session')->group(function () {
    Route::get('/', function () {
        $user = session('user');
        return view('dashboard.parent.index', ['user' => $user]);
    })->name('index');
});
