<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,... $roles): Response
    {
        $user_role = $request->user()->getRole(); // Mendapatkan user yang sedang login dr UserModel;
        if(in_array($user_role, $roles)){ // Memeriksa apakah peran user ada di array peran yang diizinkan
            return $next($request);
        }
        // Jika user tidak memiliki peran yang sesuai, kembalikan respons 403 Forbidden
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
        
    }
}
