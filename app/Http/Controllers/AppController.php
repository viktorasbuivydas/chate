<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use App\Events\RealTimeMessage;
use App\Events\NotificationSent;
use App\Http\Resources\TopicResource;

class AppController extends Controller
{
    public function index()
    {

        return inertia('App/Index');
    }
}
