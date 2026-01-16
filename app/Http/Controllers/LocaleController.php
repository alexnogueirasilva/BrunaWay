<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class LocaleController extends Controller
{
    public function switch(string $locale): JsonResponse
    {
        if (! in_array($locale, ['pt_BR', 'en'], true)) {
            return response()->json(['error' => 'Invalid locale'], 400);
        }

        // Set cookie for 1 year
        cookie()->queue('locale', $locale, 525600);

        return response()->json(['success' => true]);
    }
}
