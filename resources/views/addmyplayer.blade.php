@extends('layouts.mainlayout')

@section('content')

       <div class="search_result_area edit-a-myplayer add-a-myplayer">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="sr_inner">
                           <div class="sr_head text-center">
                               <h2>Add Your MyPLAYER</h2>
                           </div>
                            
                             @if (Session::has('success'))
                            <div class="alert alert-success">{!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                        @endif

                           <div class="add-a-myplayer-box">
                               <form method="POST" action="{{ route('addmyplayer') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                   <div class="row">
                                       <div class="col-md-4">
                                           <div class="forms_item">
                            <fieldset>
                                <label for="playername">MyPLAYER Name <span>*</span></label>
                                <input type="text" name="playername" id="playername" placeholder="Lorenzen Wright">
                            </fieldset>
                            <fieldset>
                                <label for="playername">MyPLAYER Gametag <span>*</span></label>
                                <input type="text" list="browsers" name="player_gametag" id="player_gametag" placeholder="Geckzu">
                                <datalist id="browsers">
                                  @foreach($users as $user)
                                    <option value="{{ $user->gametag }}">
                                  @endforeach
                                </datalist>
                            </fieldset>  
<?php                                                    
$positions = array('PG'=>'Point Guard','SG'=>'Shooting Guard','SF'=>'Small Forward','PF'=>'Power Forward','C'=>'Center');
$platforms = array('Xbox One','PS4','PC','Xbox 360','PS3','Switch');
$primaryskills = array('Passing &amp; Ball Handling','Shot Creating','3pt Shooting','Driving &amp; Finishing','Defending','Post Scoring','Rebounding');
$secondaryskills = array('Passing &amp; Ball Handling','Shot Creating','3pt Shooting','Driving &amp; Finishing','Defending','Post Scoring','Rebounding');
$days = array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');   
?>                                   
<fieldset>
<label for="position">Position <span>*</span></label>
<select name="position" id="position">
@foreach($positions as $key => $value)
<option value="{{ $key }}">{{ $value }}</option>
@endforeach
</select>
</fieldset> 
                                              
<fieldset>
<label for="platform">Platform <span>*</span></label>
<select name="platform" id="platform">
@foreach($platforms as $key => $value)
<option value="{{ $value }}">{{ $value }}</option>
@endforeach
</select>
</fieldset>  
		                               
   <fieldset>
      <label for="timezone">Time Zone</label>
          <select name="timezone" id="timezone">
            <?php 
              function tz_list() {
                $zones_array = array();
                $timestamp = time();
                foreach(timezone_identifiers_list() as $key => $zone) {
                  date_default_timezone_set($zone);
                  $zones_array[$key]['zone'] = $zone;
                  $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
                }
                return $zones_array;
              }
            ?> 
                    @foreach(tz_list() as $t)                                                
                      <option value="{{ $t['diff_from_GMT'] }} - {{$t['zone'] }}">
                      {{ $t['diff_from_GMT'] }} - {{$t['zone'] }}
                      </option>
                    @endforeach
                                                   
              </select>
        </fieldset>
                                             
      <fieldset>
      <label for="primaryskill">Primary Skill <span>*</span></label>
          <select name="primaryskill" id="primaryskill">
            @foreach($primaryskills as $key => $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
          </select>
      </fieldset>
                                             
      <fieldset>
      <label for="secondaryskill">Secondary Skill <span>*</span></label>
        <select name="secondaryskill" id="secondaryskill">
          @foreach($secondaryskills as $key => $value)
            <option value="{{ $value }}">{{ $value }}</option>
          @endforeach
        </select>
      </fieldset>
                                             
      <fieldset>
        <label for="currentrating">Current Rating <span>*</span></label>
        <select name="currentrating" id="currentrating">
            @for ($i = 99; $i >=60; $i--)
              <option value="{{ $i }}">{{ $i }}</option> 
            @endfor    
        </select>
      </fieldset>
                                              
     </div>
 </div>
                                       
<div class="col-md-4">
  <div class="forms_item">
        <fieldset>
        <label for="myself">Describe your play style in 140 characters <span>*</span></label>

<textarea  name="myself" id="myself" cols="30" rows="10" placeholder="I have a high basketball IQ and I play true sim. I take about 10 shots a game. I'm a solid defender who understands switching and ball deny." onkeydown="limitText(this.form.myself,this.form.countdown,140);" onkeyup='limitText(this.form.myself,this.form.countdown,140);'></textarea>
            <span>
            <input readonly type="text" name="countdown" size="3" value="140" style="border: 1px solid white !important;width: 8% !important;padding: 0px !important;"> 
            characters left</span>       
        </fieldset>
        <fieldset>
          <label for="bronze"># of Bronze Badges <span>*
          </span></label>
              <select name="bronze" id="bronze">
                @for ($i = 0; $i <= 12; $i++)
                  <option value="{{ $i }}">{{ $i }}</option> 
                @endfor      
              </select>
        </fieldset>

        <fieldset>
          <label for="silver"># of Silver Badges <span>*</span></label>
            <select name="silver" id="sliver">
              @for ($i = 0; $i <= 12; $i++)
                <option value="{{ $i }}">{{ $i }}</option> 
              @endfor    
            </select>
        </fieldset>
                                             
        <fieldset>
              <label for="gold"># of Gold Badges <span>*</span></label>
                <select name="gold" id="gold">
                    @for ($i = 0; $i <= 12; $i++)
                      <option value="{{ $i }}">{{ $i }}</option> 
                    @endfor 
                  </select>
          </fieldset>
                       
           <fieldset>
              <label for="hfame"># of Hall of Fame Badges <span>*</span></label>
               <select name="hfame" id="hfame">
                   @for ($i = 0; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option> 
                      @endfor 
               </select>
           </fieldset>
                       
         <fieldset>
             <label for="file">Ratings and Badge Verification <span>*</span></label>
             <input type="file" name="file" id="file">
             <span>Please upload a screenshot of your rating and badge screen. We will verify your ratings and badges within 24 hours. </span>
         </fieldset>                   
         </div>
     </div>
                                       
                                       <div class="col-md-4">
                                           <div class="forms_item">
                                             <fieldset>
                                                 <label for="mic">Mic / No Mic <span>*</span></label>
                                                 <select name="mic" id="mic">
                                                     <option value="mic">Mic</option>
                                                     <option value="No Mic">No Mic</option>
                                                 </select>
                                             </fieldset>
                                             
                                  <fieldset>
                                     <label>Game Modes Interested <span>*</span></label>
                                     <input type="checkbox" value="MyPARK" name="gamemode[]">MyPARK / Neighborhood <br>
                                     <input type="checkbox" value="Pro-Am" name="gamemode[]">Pro-Am <br>
                                     <input type="checkbox" value="Team-Up" name="gamemode[]">Team-Up
                                 </fieldset>
                                             
                                             <fieldset>
                                                 <label for="ytlink">YouTube Link (for highlights, tips, etc.)</label>
                                                 <input type="text" id="ytlink" placeholder="https://www.youtube.com/channel/UCQwT" name="ytlink">
                                             </fieldset>
                                             
<fieldset>
  <label for="time">Add Available Times to Play <span>*</span></label>
  <div class="availabeltime-formsection" id="time_show"> 
  </div>
    <div class="available-formgroup time_add">
      <select name="day" id="day">
        @foreach($days as $key => $value)
        <option value="{{ $value }}">{{ $value }}</option>
        @endforeach
      </select>
       <div class="input-group bootstrap-timepicker timepicker">
            <input id="timepicker1" type="text" class="">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
      </div> 
      <div class="input-group bootstrap-timepicker timepicker">
            <input id="timepicker2" type="text" class="">
            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
      </div> 
    </div>
  <div class="available-buttongroup">
  <button id="add_time" type="button">Add Hours</button>  
  </div>
</fieldset>
                                             
                                             
                                             
                                           </div>
                                       </div>
                                   </div>
                                   <input type="hidden" value="{{Auth::user()->id}}" name="player_adder_id">
                                       <input type="submit" value="Submit Your MyPLAYER" name="submit">
                                   
                               </form>

                           </div>

                       </div>
                   </div>

               </div>
           </div>
           <div class="play_add" style="margin-top: 50px;">
                                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                  <!-- 2KFreeAgent -->
                                  <ins class="adsbygoogle"
                                  style="display:inline-block;width:728px;height:90px"
                                  data-ad-client="ca-pub-3480703874601662"
                                  data-ad-slot="7380016679"></ins>
                                  <script>
                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                  </script>
                            </div>
       </div>

    <script type="text/javascript">
       function limitText(limitField, limitCount, limitNum) {
          if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
          } else {
            limitCount.value = limitNum - limitField.value.length;
          }
        }
    </script>
    <script type="text/javascript">
        $('#timepicker1').timepicker();
        $('#timepicker2').timepicker();
    </script>
    <script>
      $(document).ready(function(){
        $('#add_time').on('click',function(){
         var day_name = $( "#day option:selected" ).text();
         var start_time = $( "#timepicker1" ).val();
         var end_time = $( "#timepicker2" ).val();
         var all_data = day_name+' '+start_time+' '+end_time;
            $('#time_show').append('<span><input type="hidden" value="'+all_data+'" name="hidden_time_data[]"><span class="available-formday">'+ day_name +'</span>'+start_time+' - '+end_time+' <img class="removeimg" style="cursor:pointer;" src="{{ URL::asset('/img/delete.png')}}" alt="2KFreeAgent"><br /></span>');
        });
        $( document ).on('click','.removeimg',function() {
          $(this).parent().remove();
        });
      });
</script>  
@endsection