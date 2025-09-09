<?php

namespace ThemeFreelancer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WebPage;

class HomeController extends Controller
{
    public function index()
    {
        $pages = WebPage::where('id', 1)->get();

        return view('theme-freelancer::home', compact('pages'));
    }
}
