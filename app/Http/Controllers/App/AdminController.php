<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return inertia('App/Admin/Index');
    }
}
