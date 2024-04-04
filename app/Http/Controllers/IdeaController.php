<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        try {
            $idea->delete();

            return view('ideas.show');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'idea' => 'required|min:5|max:240'
            ]);

            $idea = Idea::create([
                'content' => $request->input('idea')
            ]);

            return redirect()->route('dashboard')->with('success', 'Idea created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Idea $idea)
    {
        try {
            $idea->delete();

            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
