@extends('layouts.mainlayout')

@section('content')
<div class="main_wrapper">
           <div class="myplayer_head">
                <div class="container">
                   <div class="row">
                       <div class="col-md-3 col-sm-3">
                           <div class="myplayer_head_left">
                               <div class="current_time">
                                   <p>CURRENT TIME</p>
                                   <time>9:00 AM EST</time>
                               </div>
                               <span>Converted to your time zone :)</span>
                           </div>
                       </div>
                       <div class="col-md-6 col-sm-6">
                           <div class="myplayer_head_middle">
                               <h2>{{$playerprofile['name']}}</h2>
                               <div class="head_bottom_box">
                                   <p><b>Gamertag:</b> {{ucfirst($playerprofile['gametag']) }}
                                    <?php $key = array_search($playerprofile['gametag'], array_column($allusers, 'gametag')); 
                                    ?>

                                    @if($allusers[$key]['online_status'] == 1)
                                    <span class="online">• ONLINE</span>
                                   
                                    @else
                                    <span class="offline">• OFFLINE</span>
                                    @endif
                                  </p>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3 col-sm-3">
                           <div class="myplayer_head_right">
                               <div class="current_time">
                                   <p>STATS LAST VERIFIED</p>
                                   <time>{{date("d/m/Y", strtotime($playerprofile['updated_at']))}}</time>
                               </div>
                               <a id="hover">What’s this?</a>
                               <div id="stuff">This date shows the last time an admin verified their ratings are correct</div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
           <div class="mayplayer_middle">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="myplayer_middle_inner">
                               <p>{{$playerprofile['description']}}</p>
                               
                               <div class="position_table myplayer_table">
                                   <table>
                                       <tr>
                                           <th>POSITION</th>
                                           <th>RATING</th>
                                           <th>PRIMARY SKILL</th>
                                           <th>SECONDARY SKILL</th>
                                       </tr>
                                       
                                       <tr>
                                           <td>{{$playerprofile['position']}}</td>
                                           <td>{{$playerprofile['current_rating']}}</td>
                                           <td>{{$playerprofile['primary_skills']}}</td>
                                           <td>{{$playerprofile['secondary_skills']}}</td>
                                       </tr>
                                   </table>
                               </div>
                               
                               <div class="position_table myplayer_table">
                                   <table>
                                       <tr>
                                           <th>PLATFORM</th>
                                           <th>TIMEZONE</th>
                                           <th>GAME MODE</th>
                                           <th>MIC/NO MIC</th>
                                       </tr>
                                       
                                       <tr>
                                           <td>{{$playerprofile['platform']}}</td>

                                           <?php $timez = explode(' ',$playerprofile['timezone'])?>
                                           <td>{{$timez[0]}}</td>
                                            <td><?php $gamemode = unserialize($playerprofile['game_mode']); 
                                          $count = count($gamemode);
                                          $i=0;
                            foreach ($gamemode as $key => $value) {
                                    $i++;
                                      if($i == $count)
                                      {
                                        echo $value;
                                      }
                                      else
                                      {
                                        echo $value; echo ',';
                                      }
                                  }?>
                                  </td>
                                           <td>{{$playerprofile['mic']}}</td>
                                       </tr>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
           <div class="mayplayer_rating">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="myplayer_rating_inner">
                              <div class="row">
                                  <div class="col-md-3 col-sm-3">
                                      <div class="mpr_schedule">
                                          <div class="available_time">
                                              <h6>AVAILABLE TIMES TO PLAY</h6>
                                              <div class="schedule_table">
                                                  <table>
        @php 
        $avl_times = json_decode($playerprofile['avaliable_time']);
        @endphp
        @foreach($avl_times as $key=>$value)
        <?php $timevalues = explode(' ',$value);?>
        <tr>
            <td>{{$timevalues[0]}}</td>
            <td>{{$timevalues[1]}} {{$timevalues[2]}} - {{$timevalues[3]}} {{$timevalues[4]}}</td>
        </tr>
         @endforeach  
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-9 col-sm-9">
                                      <div class="mpr_rating">
                                         <div class="ratings">
                                             <ul>
            <?php  $total = $playerprofile['bronze_badge']+ $playerprofile['silver_badge']+ $playerprofile['gold_badge']+$playerprofile['fame_badge'];?>

                                                 <li class="total">
                                                 {{$total}}</li>
                                                 <li class="rate1">{{$playerprofile['bronze_badge']}}</li>
                                                 <li class="rate2">{{$playerprofile['silver_badge']}}</li>
                                                 <li class="rate3">{{$playerprofile['gold_badge']}}</li>
                                                 <li class="rate4">{{$playerprofile['fame_badge']}}</li>
                                             </ul>
                                         </div> 
                                         
                                         <div class="youtube_box">
                                             <h6>YOUTUBE CHANNEL (HIGHLIGHTS, TIPS, GAME FOOTAGE, ETC)</h6>
                                             
                                             <a href="{{$playerprofile['youtube_link']}}">{{$playerprofile['youtube_link']}}</a>
                                         </div>
                                         
                                         <div class="play_add">
                                            <a href="#"><img src="img/add.png" alt=""></a>
                                        </div>
                                      </div>
                                  </div>
                              </div> 
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
       </div>
  @endsection