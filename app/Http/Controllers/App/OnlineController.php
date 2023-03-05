<?php

namespace App\Http\Controllers\App;

use App\Models\Online;
use App\Http\Controllers\Controller;
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
