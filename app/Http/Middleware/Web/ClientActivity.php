<?php

namespace App\Http\Middleware\Web;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class ClientActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('client')->check()){
            Client::find(Auth::guard('client')->user()->id)->update([
                'lastseen_at'=>now(),
            ]);
        }
        return $next($request);
    }
}
