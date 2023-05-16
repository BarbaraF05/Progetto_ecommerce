<?php

namespace App\Http\Middleware;

use App\Models\Announcement;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAccepted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        /* io ho accesso se sono revisore o se l'annuncio viene approvato */
        if($request->announcement->is_accepted || Auth::user()->is_revisor){
            return $next($request);   
        }else{
            abort(403);
        }
        
        
    }
}
