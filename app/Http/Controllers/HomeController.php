<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Orders;

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
        $posts = Posts::orderBy('id', 'desc')->get();
        $orders = Orders::orderBy('id', 'desc')->get();
        
        return view('home', ['posts' => $posts],
                            ['orders' => $orders]);
                            
    }
}
