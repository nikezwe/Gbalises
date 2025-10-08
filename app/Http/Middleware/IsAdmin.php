<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;



class IsAdmin
{
public function handle($request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
        abort(403, 'Accès refusé. Seuls les administrateurs peuvent accéder à cette section.');
}
        return $next($request);
    }
}
