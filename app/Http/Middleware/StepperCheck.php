<?php

namespace App\Http\Middleware;

use App\Models\Stepper;
use Closure;
use Illuminate\Http\Request;

class StepperCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $stepper = Stepper::where('pikr_id', \auth()->user()->id)->first();

        session(['stepper' => $stepper]);

        return $next($request);
    }
}
