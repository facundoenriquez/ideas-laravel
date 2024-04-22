<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        // for testing email blade for sending
        // return new WelcomeEmail(auth()->user());

        $ideas = Idea::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            // is scopeSearch in Idea model but just with the name search
            $ideas = $ideas->search(request('search', ''));
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
