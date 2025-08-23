<?php

namespace Lareon\CMS\App\Http\Controllers\Api\Auth;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Lareon\CMS\App\Http\Controllers\Controller;
use function Pest\Laravel\json;

class AuthenticatedSessionController extends Controller
{
    public function login(Request $request)
    {
        return 'dff';
    }
}
