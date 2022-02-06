<?php

namespace App\Http\Middleware;

use Closure;
use Database\Seeders\user;
use Illuminate\Http\Request;

class usersmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {// {   dd($request);
        $user = auth()->user();
        $roles = ['admin','director'];
        
        if(!$user){
            return redirect()->route('login');
        }
        $role = $user->role;
        // dd($role);
        if(!$role || in_array($role,$roles)){
            if($role == $roles[0]){
                // abort(403,'sizda adminlik  huquq mavjud');
                // return view('/home',compact('role'));
                // dd($role);
                return $next($request,compact('role'));
            }
            if($role == $roles[1]){
                // abort(403,'sizda directorlik  huquq mavjud');
                // return view('/home',compact('role'));
                //  dd($role);
                return $next($request,compact('role'));

            }
            // return abort(403,'sizda umuman huquq yo\'q');
            // return view('/home',compact('role'));
                // dd($role);
                return $next($request,compact('role'));

        }

        return $next($request);
    }
}
