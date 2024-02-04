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
        $request->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea = new Idea([
            'content' => $request->get('content')
        ]);
        $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content');
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea Updated successfully!');
    }

    public function edit(Request $request, Idea $idea)
    {
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();
        
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
