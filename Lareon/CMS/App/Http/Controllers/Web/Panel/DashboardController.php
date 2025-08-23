<?php

namespace Lareon\CMS\App\Http\Controllers\Web\Panel;

use Illuminate\Http\Request;
use Lareon\CMS\App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show()
    {
        return view('lareon::panel.pages.dashboard');
    }
}
