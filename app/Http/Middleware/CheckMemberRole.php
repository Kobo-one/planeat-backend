<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckMemberRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = NULL)
    {
        if(Auth::user()){
            if(Auth::user()->has('Family')){
                if(Auth::user()->currentMember()){
                    if(Auth::user()->currentMember()->hasRole('Parent')){
                        if($role == 'Adult'){
                            return $next($request);
                        }
                        return redirect()->route('adult_index');

                    }else if(Auth::user()->currentMember()->hasRole('Child')){
                        if($role == 'Child'){
                            return $next($request);
                        }
                        return redirect()->route('child_index');

                    }
                }
                return redirect()->route('member_index');
            }
            return redirect()->route('family_create');

        }
        return redirect()->route('login');
    }
}
