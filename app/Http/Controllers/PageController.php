<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show FAQ page
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * Show About page
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show Contact page
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
