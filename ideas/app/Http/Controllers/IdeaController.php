<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|min:5|max:240'
        ]);
        //current logged in user
        $validated['user_id'] = auth()->id();
        //only create ideas with the fields which are validated
        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function update(Idea $idea)
    {
        // if (auth()->id() != $idea->user_id) {
        //     abort(404, "not authorized");
        // }

        $this->authorize('update', $idea);

        $validated = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea Updated successfully!');
    }

    public function edit(Request $request, Idea $idea)
    {
        // if (auth()->id() != $idea->user_id) {
        //     abort(404, "no authorized");
        // }
        $this->authorize('update', $idea);

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function destroy(Idea $idea)
    {
        // if (auth()->id() != $idea->user_id) {
        //     abort(404, "no authorized");
        // }
        $this->authorize('delete', $idea);

        $idea->delete();
        
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
