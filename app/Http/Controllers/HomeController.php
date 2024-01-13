<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $userCountFromDatabase = User::count();

    // You can fetch other dynamic data here...

        return view('home',compact('userCountFromDatabase'));
    }

    public function registerUser()
    {
        return auth()->user() ? redirect('home') : view('auth.register');
    }
}
