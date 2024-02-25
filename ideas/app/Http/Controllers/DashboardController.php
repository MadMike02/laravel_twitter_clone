<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //for previewing email template in front
        // return new WelcomeEmail(auth()->user());
        // $ideas = Idea::with('user', 'comments.user')->orderBy('created_at', 'desc');
        // $ideas = Idea::without('user', 'comments.user')->orderBy('created_at', 'desc');
        $ideas = Idea::orderBy('created_at', 'desc');

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%'.request()->get('search').'%');
        }
        
        return view('dashboard', ['ideas' => $ideas->paginate(5)]);
    }
}
