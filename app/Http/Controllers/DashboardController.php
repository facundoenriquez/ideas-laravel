<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $idea = new Idea();
        $idea->content = "test";
        $idea->likes = 0;
        $idea->save();
        return view('dashboard');
    }
}
