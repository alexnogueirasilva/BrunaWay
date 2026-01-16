<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Try to get locale from cookie first, then fall back to config
        $locale = $request->cookie('locale', config('app.locale'));

        // Validate and set locale
        if (in_array($locale, ['pt_BR', 'en'], true)) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
