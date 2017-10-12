<?php

namespace App\Http\Controllers;
use App\User;
use App\Addplayer;
use App\Mail\NewPlayer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AddmyplayerController extends Controller
{
   

      public function addmyplayer(Request $request)
          {
            $users = User::get();
            return view('addmyplayer',['users'=>$users]);
          }

    public function store(Request $request)
            {   
                
             $response = array(); 
             $Addplayer = new Addplayer();                  
            if($request->isMethod('post')) { 

    $validation['playername'] = 'required'; 
    $validation['position'] = 'required'; 
    $validation['platform'] = 'required'; 
    $validation['primaryskill'] = 'required'; 
    $validation['secondaryskill'] = 'required'; 
    $validation['currentrating'] = 'required'; 
    $validation['myself'] = 'required';
    $validation['bronze'] = 'required';  
    $validation['silver'] = 'required'; 
    $validation['gold'] = 'required'; 
    $validation['hfame'] = 'required'; 
    $validation['file'] = 'required'; 
    $validation['mic'] = 'required'; 
    $validation['gamemode'] = 'required';
    $validation['player_gametag'] = 'required';  
                $validator = Validator::make($request->all(), $validation); 
            if($validator->fails()) 
                {                
                    //$response['error'] = $validator->errors()->all();
                     $request->session()->flash('failure', 'Please fill all required fields.');

                }
            else{
            $Addplayer->name = $request['playername'];
            $Addplayer->position = $request['position']; 
            $Addplayer->platform = $request['platform'];
            $Addplayer->timezone = $request['timezone'];
            $Addplayer->primary_skills = $request['primaryskill'];
            $Addplayer->secondary_skills = $request['secondaryskill'];
            $Addplayer->current_rating = $request['currentrating'];
            $Addplayer->description = $request['myself'];
            $Addplayer->bronze_badge = $request['bronze'];
            $Addplayer->silver_badge = $request['silver'];
            $Addplayer->gold_badge = $request['gold'];
            $Addplayer->fame_badge = $request['hfame'];

            //$Addplayer->file_uploads = $request['file'];
            $file = $request['file'];            
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/';
            $file->move($destinationPath,$fileName);
            $Addplayer->file_uploads = $fileName ;
        

            $Addplayer->mic = $request['mic'];
            $Addplayer->game_mode = serialize($request['gamemode']);
            $Addplayer->youtube_link = $request['ytlink'];
            $Addplayer->avaliable_time = json_encode($request['hidden_time_data']);
            $Addplayer->player_adder_id = $request['player_adder_id'];
            //$Addplayer->gametag = Auth::user()->gametag;
            $Addplayer->gametag = $request['player_gametag'];
          
              if($Addplayer->save()){                                    
                //$response['success'] = 'TRUE';
                Mail::to('jitendra@techsparksit.com')->send(new NewPlayer($Addplayer));
                $request->session()->flash('success', 'Your player has been Added.');               
                }           
            }
        }
        return back();                
        } 
}
