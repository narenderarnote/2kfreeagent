<?php

namespace App\Http\Controllers;

use App\User;
use App\Addplayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditplayerController extends Controller
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
  /*  public function index()
    {
        return view('home');
    }*/

      public function editplayer(Request $request)
          {
            
            $players = Addplayer::all()->sortByDesc('current_rating')->toArray();
            //print_r($players);
            return view('editmyplayer', compact('players'));
            //return view('editmyplayer');
          }


    public function editsingleplayer($id)
    {
        $singleplayer = Addplayer::find($id);
        $users = User::get();
        return view('editsingleplayer',compact('singleplayer','id','users'));
    }
    public function update(Request $request ,$id)
            {   
             $response = array(); 
             //$edittplayer = new Addplayer(); 
            $Addplayer = Addplayer::where('id', $id)->first();                
            if($request->isMethod('post')) { 

                $validation['playername'] = 'required';
                $validation['player_gametag'] = 'required';
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

            $file = $request['file'];
            
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $Addplayer->file_uploads = $fileName ;


            //$Addplayer->file_uploads = $request['file'];
            $Addplayer->mic = $request['mic'];
            $Addplayer->game_mode = $request['gamemode'];
            $Addplayer->youtube_link = $request['ytlink'];
            $Addplayer->avaliable_time = json_encode($request['hidden_time_data']);
            $Addplayer->player_adder_id = $request['player_adder_id'];
            $Addplayer->player_gametag = $request['player_gametag'];
              if($Addplayer->save()){                                    
                //$response['success'] = 'TRUE'; 
                $request->session()->flash('success', 'Your player has been Updated.');               
                }           
            }
        }
        return back();
        //return view('editsingleplayer/{id}',compact('edittplayer','id'));                
        } 


        public function updateGametag(Request $request){
          $request->validate([
            'gametag' => 'required|unique:users,gametag',
          ]);
          User::whereId(Auth::user()->id)->update(['gametag' => $request->get('gametag')]);
          Addplayer::where('gametag',$request->get('old_gametag'))->update(['gametag' => $request->get('gametag')]);
          return redirect()->back();
        }
  /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteplayer = Addplayer::find($id);
        $deleteplayer->delete();
        return redirect('editmyplayer')->with('success','Player has been  deleted Successfully');
    }
}
