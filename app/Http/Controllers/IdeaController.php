<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        try {
            return view('ideas.show', compact('idea'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Idea $idea)
    {
        try {
            $editing = true;
            return view('ideas.show', compact('idea', 'editing'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'content' => 'required|min:5|max:240'
            ]);

            Idea::create([
                'content' => $request->input('content')
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

    public function update(Idea $idea)
    {
        try {

            request()->validate([
                'content' => 'required|min:5|max:240'
            ]);

            $idea->content = request()->get('content');
            $idea->save();

            return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
