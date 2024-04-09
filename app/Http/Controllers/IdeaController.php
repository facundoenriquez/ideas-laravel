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
            if (auth()->id() !== $idea->user->id) {
                abort(404);
            }
            $editing = true;
            return view('ideas.show', compact('idea', 'editing'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'content' => 'required|min:5|max:240'
            ]);

            $validated['user_id'] = auth()->id();

            Idea::create($validated);

            return redirect()->route('dashboard')->with('success', 'Idea created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Idea $idea)
    {
        try {
            if (auth()->id() !== $idea->user->id) {
                abort(404);
            }

            $idea->delete();

            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Idea $idea)
    {
        try {
            if (auth()->id() !== $idea->user->id) {
                abort(404);
            }

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
