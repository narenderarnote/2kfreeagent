<?php

namespace App\Http\Controllers;

use App\Addplayer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SearchallplayerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  /*  public function index()
    {
        return view('home');
    }*/

      public function searchallplayer(Request $request)
          {            
            $searchallplayers = Addplayer::with('user')->get()->sortByDesc('current_rating')->toArray();          
            $justaddedplayers = Addplayer::with('user')->get()->sortByDesc('created_at')->toArray();
            $allusers = User::get()->toArray();         
            return view('search-all-player', compact('searchallplayers','justaddedplayers','allusers'));
          }

  

}
