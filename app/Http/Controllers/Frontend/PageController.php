<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about()
    {
        return view('frontend.about');
    }

    public function kvkk()
    {
        return view('frontend.kvkk');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy');
    }

    public function cookiePolicy()
    {
        return view('frontend.cookie');
    }

}
