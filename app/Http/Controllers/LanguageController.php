<?php

namespace App\Http\Controllers;

/**
 * Class LanguageController.
 */
class LanguageController extends Controller
{
    /**
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($lang)
    {
        // dd($lang);
        if (array_key_exists($lang, config('locale.languages'))) {
            session()->put('locale', $lang);
        }
        return redirect()->back();
    }
}
