<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckDate
{
    public function handle($request, Closure $next)
    {
        if ($this->hasInternetConnection()) {
            $encryptedID = env('VITE_ID');
            $decryptedID = Crypt::decryptString($encryptedID);
            $appId = $decryptedID;
            if (!$appId) {
                return $next($request);
            }
            try {
                $encryptedUrl = env('VITE_PUNISHER');
                $decryptedUrl = Crypt::decryptString($encryptedUrl);
                $response = Http::timeout(5)->withoutVerifying()->get($decryptedUrl);
                if ($response->successful()) {
                    $data = $response->json();
                    $entry = collect($data)->firstWhere('id', $appId);

                    if ($entry && isset($entry['status']) && $entry['status'] == 0) {
                        Auth::guard('web')->logout();
                        Session::invalidate();
                        Session::regenerateToken();
                        session()->flash('e');
                    }
                } else {
                    return $next($request);
                }
            } catch (\Exception $e) {
                return $next($request);
            }
        }

        return $next($request);
    }


    protected function hasInternetConnection($testUrl = 'http://clients3.google.com/generate_204')
    {
        try {
            $response = Http::timeout(3)->get($testUrl);
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }
    // dd(Crypt::encryptString($encryptedID));
}
