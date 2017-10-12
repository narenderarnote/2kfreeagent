<?php

namespace App\Http\Controllers;

use App\Addplayer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyplayerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
            //$request->user()->authorizeRoles(['admin', 'player']);

      public function showmyplayer($id)
          {
             
            $playerprofile = Addplayer::find($id);
            $allusers = User::get()->toArray(); 
        return view('myplayer',compact('playerprofile','id','allusers'));
          }
  
}
