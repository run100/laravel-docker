<?php

namespace App\Http\Controllers;

use App\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::id();
        // dump($id);
        return view('home');
    }

    public function talks()
    {

        $talks = Talk::orderBy('created_at', 'desc')->paginate(15);

        return view('talks', compact('talks'));
    }

    public function postTalks(Request $request)
    {
        // dump($request->all());
        $talk = new Talk();
        $talk->uid = Auth::user()->id;
        $talk->message = $request->get('message');
        $talk->save();

        return redirect(route('talks'));
    }
}
