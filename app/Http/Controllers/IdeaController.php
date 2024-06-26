<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
            Gate::authorize('update', $idea);

            $editing = true;
            return view('ideas.show', compact('idea', 'editing'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(CreateIdeaRequest $request)
    {
        try {
            $validated = $request->validated();

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
            Gate::authorize('delete', $idea);

            $idea->delete();

            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(UpdateIdeaRequest $request,Idea $idea)
    {
        try {
            Gate::authorize('update', $idea);

            $validated = $request->validated();

            $idea->update($validated);

            return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
