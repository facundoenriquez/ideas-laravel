<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard')->with('success', 'like successfully');
    }

    public function unlike(Idea $idea)
    {
        $unliker = auth()->user();
        $unliker->likes()->detach($idea);
        return redirect()->route('dashboard')->with('success', 'unlike successfully');
    }
}
