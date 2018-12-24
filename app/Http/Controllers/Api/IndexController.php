<?php

namespace App\Http\Controllers\Api;

use Barryvdh\TranslationManager\Models\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLocalization;

class IndexController extends Controller
{
    public function configure()
    {
        foreach (Translation::orderBy('key', 'asc')->get() as $translation) {
            $translations[$translation->locale][$translation->group .'.'. $translation->key] = $translation->value;
        }

        return response()->json([
            'lan' => $translations,
            'locales' => LaravelLocalization::getSupportedLocales(),
            'supported_countries' => [
                'countries' => countries(),
                'phone_countries' => phone_countries()
            ]
        ]);
    }

}
