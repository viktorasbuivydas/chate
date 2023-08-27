<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Online;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OnlineController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        if (request()->wantsJson()) {
            return Online::active()->get();
        }
    }
}
