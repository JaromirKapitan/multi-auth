<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebMenu;
use App\Models\WebPage;

class WebMenuController extends Controller
{
    public function edit()
    {
        return view('admin.web-menu.edit');
    }
}
