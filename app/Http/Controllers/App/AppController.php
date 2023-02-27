<?php

namespace App\Http\Controllers\App;

use App\Traits\AuthorizeTrait;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AppController extends Controller
{
    use AuthorizesRequests;
    use AuthorizeTrait;

    public function index()
    {
        return inertia('App/Index');
    }
}
