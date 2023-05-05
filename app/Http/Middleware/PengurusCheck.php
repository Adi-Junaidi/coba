<?php

namespace App\Http\Middleware;

use App\Models\Pengurus;
use Closure;
use Illuminate\Http\Request;

class PengurusCheck
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
        $ketua = Pengurus::where('pikr_id', \auth()->user()->pikr->id)->where('jabatan', 'Ketua')->first();
        $pendidikSebaya = Pengurus::where('pikr_id', \auth()->user()->pikr->id)->where('jabatan', 'Pendidik Sebaya')->first();
        $konselorSebaya = Pengurus::where('pikr_id', \auth()->user()->pikr->id)->where('jabatan', 'Konselor Sebaya')->first();

        if(!$ketua){
            return \redirect('/up/data/pengurus')->with('fail', 'Harap mengisi data Ketua PIK-R terlebih dahulu');
        }else if (!$pendidikSebaya){
            return \redirect('/up/data/pengurus')->with('fail', 'Harap mengisi minimal 1 pendidik sebaya PIK-R terlebih dahulu');
        }else if(!$konselorSebaya){
            return \redirect('/up/data/pengurus')->with('fail', 'Harap mengisi minimal 1 konselor sebaya PIK-R terlebih dahulu');
        }

        return $next($request);
    }
}
