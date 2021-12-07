<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;
use App\Models\RolUsuario;


class SecretaryRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $currentUserId = Auth::user()->id;// Obtains the current active user ID
        $userRole = RolUsuario::select('rol_id')->where('usuario_id', $currentUserId)->first();// Make an Eloquent query to get the user role
        $userRole = $userRole['rol_id'];

        // Validates if active user is Secretary
        if ($userRole == '2'):
            return $next($request);
        else:
            return redirect('/');// ...
        endif;

    }
}
