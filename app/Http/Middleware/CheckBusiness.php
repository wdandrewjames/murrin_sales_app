<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBusiness
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
        if ($request->user()->business_id) {
            return redirect()->route('business.show', $request->user()->business_id);
        }
        return $next($request);
    }
}
