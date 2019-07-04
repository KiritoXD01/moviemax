<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::count();
        $users  = User::count();

        $TopMovies = Movie::withCount('users')
            ->limit(10)
            ->orderBy('users_count', 'desc')
            ->get();

        return view('home', compact('movies', 'users', 'TopMovies'));
    }

    public function changeLanguage(Request $request)
    {
        session(['locale' => $request->language]);

        return redirect()->back();
    }
}
