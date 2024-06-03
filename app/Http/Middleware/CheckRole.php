<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if (empty($user)) {
            return redirect()->route('login');
        }
        $actionName = \Route::getCurrentRoute()->getName();
        if ($user->hasPermission($actionName)) {
          
            return $next($request);
        }

        if($request->expectsJson())
            return response()->json(['check' => false, 'msg' => "Bạn không có quyen truy cập vào api này"]);


        if ($user) {
            Auth::logout();
        }

        abort(401);
    }
}
