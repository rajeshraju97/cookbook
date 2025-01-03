<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $url = $request->url();

        // Check if the visitor with the same IP has already been logged today
        if (!$this->isVisitorLogged($ip)) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'url' => $url,
            ]);

            \Log::info('Visitor logged:', ['ip' => $ip, 'userAgent' => $userAgent, 'url' => $url]);

        }

        return $next($request);
    }

    protected function isVisitorLogged($ip)
    {
        return Visitor::where('ip_address', $ip)
            ->whereDate('created_at', today())
            ->exists();
    }
}
