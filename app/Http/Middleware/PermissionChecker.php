<?php namespace App\Http\Middleware;

use App\AuthenticationToken;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PermissionChecker {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $access = $this->userHasAccessTo($request);
        if ($access && is_bool($access))
            return $next($request);
        else if ($access == 'redir')
            return redirect()->guest('login');
        return redirect()->route('home');
    }

    public function userHasAccessTo($request)
    {
        return $this->hasPermission($request);
    }

    public function hasPermission($request)
    {
        $required = $this->requiredPermission($request);
        if (is_null($required))
            return true;
        if (Auth::check())
            return $request->user()->canDo($required);
        if (Input::has('token'))
            {
                $token = AuthenticationToken::whereToken(Input::get('token'))->first();
                if (is_null($token))
                {
                    return "redir";
                }
                $user = $token->user()->first();
                session()->flash('token', $user);
                auth()->onceUsingId($user->id);
                return $user->canDo($required);
            }
        return "redir";
    }

    public function requiredPermission($request)
    {
        $action = $request->route()->getAction();
        return isset($action['can']) ? explode('|', $action['can']) : null;
    }

    public function forbiddenRoute($request)
    {
        $action = $request->route()->getAction();
        if (isset($action['except']))
            return $action['except'] == $request->user()->roles->role_slug;
        return false;
    }
}