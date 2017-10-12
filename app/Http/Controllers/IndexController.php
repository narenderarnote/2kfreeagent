<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use App\Addplayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  /*  public function index()
    {
        return view('home');
    }*/

  public function indexplayer(Request $request){
    return view('index');
  }
  public function topplayers(Request $request){
    if(Auth::check()){ 
        User::whereId(Auth::user()->id)->update(['online_status'=> 1]);
        }
    $topplayers = Addplayer::all()->sortByDesc('current_rating')->toArray();
    $justadded = Addplayer::all()->sortByDesc('created_at')->toArray();
    return view('index', compact('topplayers','justadded'));
  }

  public function teamSearch(Request $request){
    $where = array();
    $whereOr = array();
    $timeZone = $request->get('timezone');
    $ratings = explode(' - ',$request->get('minrate'));
    /*if($request->get('keyword')){
      //echo $request->get('keyword');
      $whereOr = ['name', 'like', '%hj'];
    }*/
    if($request->get('pskill') != 'Any'){
      $primarySkills = ['primary_skills' => $request->get('pskill')];
      $where = array_merge($where,$primarySkills);
    }
    if($request->get('sskill') != 'Any'){
      $secondarySkills = ['secondary_skills' => $request->get('sskill')];
      $where = array_merge($where,$secondarySkills);
    }
    if($request->get('positions') != 'Any'){
      $positions = ['position'=>$request->get('positions')];
      $where = array_merge($where,$positions);
    }
    if($request->get('platform') != 'Any'){
      $platform = ['platform'=>$request->get('platform')];
      $where = array_merge($where,$platform);
    }
    if($request->get('gamemode') != 'Any'){
      $gamemodes = ['game_mode' =>$request->get('gamemode')];
      $where = array_merge($where,$gamemodes);
    }
    if(count($where)>0){
      if($request->get('keyword')){
        $searchallplayers = Addplayer::with('user')->where($where)->where('timezone',$timeZone)->whereBetween('current_rating',[$ratings[0], $ratings[1]])->where('gametag', 'like', '%'.$request->get('keyword').'%')->get()->toArray();
      }else{
        $searchallplayers = Addplayer::with('user')->where($where)->where('timezone',$timeZone)->whereBetween('current_rating',[$ratings[0], $ratings[1]])->get()->toArray();
      }
    }else{
      if($request->get('keyword')){
        $searchallplayers = Addplayer::with('user')->where('timezone',$timeZone)->whereBetween('current_rating',[$ratings[0], $ratings[1]])->where('gametag', 'like', '%'.$request->get('keyword').'%')->get()->toArray();
      }else{
        $searchallplayers = Addplayer::with('user')->where('timezone',$timeZone)->whereBetween('current_rating',[$ratings[0], $ratings[1]])->get()->toArray();
      }
    }
    /*echo "<pre>";
    print_r($searchallplayers);
    exit;*/
    return view('search-all-player', compact('searchallplayers'));
  }
  public function profileSearchFiels(Request $request){
     $fields = User::get();
    foreach ($fields as $query){
      $results[] = ['name' => $query->name];
    }
    return response()->json($results);
  }
  public function plateformBasedSerch($name){
    if(trim($name) == 'XBox-One'){
      $searchallplayers = Addplayer::with('user')->where('platform','XBox One')->get()->toArray();
    }else if(trim($name) == 'PS4'){
      $searchallplayers = Addplayer::with('user')->where('platform','PS4')->get()->toArray();
    }else if(trim($name) == 'PC'){
        $searchallplayers = Addplayer::with('user')->where('platform','PC')->get()->toArray();
    }else if(trim($name) == 'XBox-360'){
        $searchallplayers = Addplayer::with('user')->where('platform','XBox 360')->get()->toArray();
    }else if(trim($name) == 'PS3'){
        $searchallplayers = Addplayer::with('user')->where('platform','PS3')->get()->toArray();
    }else if(trim($name) == 'Switch'){
        $searchallplayers = Addplayer::with('user')->where('platform','Switch')->get()->toArray();
    }else{
      return redirect()->back();
    }
    return view('search-all-player', compact('searchallplayers'));
  }
  public function userLogout(){
  User::whereId(Auth::user()->id)->update(['online_status'=> 0]);
  
  Auth::logout();
  Session::flush();
   return redirect('/');
  }

}
