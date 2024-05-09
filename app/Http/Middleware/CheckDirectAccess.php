<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDirectAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Check if the request does not come from an internal source (e.g., a link clicked by the user)
    $url = $request->getRequestUri();

    // Define the patterns to disallow access
    $disallowedPatterns = ['checkAvail', 'educationalQual', 'completeApp', 'submitApp'];

    // Check if the URL ends with any of the disallowed patterns
    foreach ($disallowedPatterns as $pattern) {
        if (str_ends_with($url, $pattern)) {
            // Check if the request method is GET
            if ($request->isMethod('get')) {
                return redirect('/');
            }
        }
    }
    return $next($request);
}
}
