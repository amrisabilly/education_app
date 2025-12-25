<?php

namespace App\Http\Middleware;

use Closure;

class SetSecurityHeaders
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->headers->set('Content-Security-Policy', "script-src 'self' https://unpkg.com 'unsafe-inline'; object-src 'none';");

        return $response;
    }
}