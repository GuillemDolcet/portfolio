<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class LocalizationController extends AdminController
{
    /**
     * [POST] /change-language
     *
     * @param Language $language
     * @return RedirectResponse
     */
    public function changeLanguage(Language $language): RedirectResponse
    {
        App::setLocale($language->name);
        session()->put('locale', $language->name);
        return redirect()->back();
    }
}