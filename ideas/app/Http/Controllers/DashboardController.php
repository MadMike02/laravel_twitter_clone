<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $idea = new Idea([
        //     'content' => 'test3'
        // ]);
        // $idea->save();

        $ideas = Idea::orderBy('created_at', 'desc')->get();
        
        return view('dashboard', ['ideas' => $ideas]);
    }
}
