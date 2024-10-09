<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق مما إذا كان المستخدم هو Admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // إذا لم يكن Admin، قم بإرجاع 403 Forbidden
        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
