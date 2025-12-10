<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('user')) {
            return redirect()->route('auth.login.page');
        }

        return $next($request);
    }
}
