<?php

namespace App\Http\Middleware;

use Closure;

class AdminRestricted
{
    /**
     * Checks if the user is connected and is an admin.
     * A redirection to 'home' is made if this predicate is not fulfiled
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // TODO: Maybe create some error page
        if (!$request->user() || !$request->user()->hasGroup('admin'))
            return redirect('home');
        return $next($request);
    }
}
