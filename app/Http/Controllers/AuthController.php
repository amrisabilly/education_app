<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }
    
    /**
     * Handle login request
     */
    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:siswa,guru,orang_tua'
        ]);
        
        // Demo credentials
        if ($credentials['email'] === 'siswa@example.com' && $credentials['password'] === 'password123') {
            session(['user' => [
                'id' => 1,
                'name' => 'Ahmad Rizki',
                'email' => $credentials['email'],
                'role' => $credentials['role'],
                'level' => 5,
                'kelas' => 'IX A'
            ]]);
            
            if ($credentials['role'] === 'siswa') {
                return redirect()->route('student.index');
            }
            
            return redirect()->route('landing');
        }
        
        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }
    
    /**
     * Handle logout
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('landing');
    }
}
