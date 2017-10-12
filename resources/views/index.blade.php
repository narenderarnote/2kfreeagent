@extends('layouts.mainlayout')
@section('content')
    <?php                                                    
        $positions = array('Point Guard','Shooting Guard','Small Forward','Power Forward','Center');
        $platforms = array('Xbox One','PS4','PC','Xbox 360','PS3','Switch');
        $primaryskills = array('Passing &amp; Ball Handling','Shot Creating','3pt Shooting','Driving &amp; Finishing','Defending','Post Scoring','Rebounding');
        $secondaryskills = array('Passing &amp; Ball Handling','Shot Creating','3pt Shooting','Driving &amp; Finishing','Defending','Post Scoring','Rebounding');   
    ?>                              
    
        <div class="player_search_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="player_search_inner">
                            <h1>Find NBA 2K18 Players to Team Up</h1>
                            <p>Find and team up with other 2K18 players for free.</p>
                            <div class="player_search_box">
                                <p>Search 2K18 MyPLAYER Database</p>
                                <form action="{{ route('teamsearch') }}" method="post">
                                {{ csrf_field() }}
                                <div class="sbf_top">
                                    <fieldset class="add_keyword">
                                        <label for="keyword">Search Additional Keywords</label>
                                        <input type="text" id="keyword" placeholder="Enter Keyword Here..." name="keyword" />
                                    </fieldset>
                                    <fieldset class="primary_skill">
                                        <label for="pskill">Primary Skill</label>
                                        <select name="pskill" id="pskill">
                                            <option value="Any">Any</option>
                                            @foreach($primaryskills as $key => $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <fieldset class="secondery_skill">
                                        <label for="sskill">Secondary Skill</label>
                                        <select name="sskill" id="sskill">
                                            <option value="Any">Any</option>
                                            @foreach($secondaryskills as $key => $value)
                                                <option value="{{ $value }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="sbf_bottom">
                                    <div class="sbfb_left">
                                        <fieldset>
                                            <label for="positions">Position(s)</label>
                                            <select name="positions" id="positions">
                                                <option value="Any">Any</option>
                                                @foreach($positions as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                        <fieldset>
                                            <label for="minrate">Min. Rating</label>
                                            <select name="minrate" id="minrate">
                                                <option value="70 - 75">70 - 75</option>
                                                <option value="76 - 80">76 - 80</option>
                                                <option value="81 - 85">81 - 85</option>
                                                <option value="86 - 90">86 - 90</option>
                                                <option value="91 - 95">91 - 95</option>
                                                <option value="95 - 99">95 - 99</option>
                                            </select>
                                        </fieldset>
                                        <fieldset>
                                            <label for="platform">Platform(s)</label>
                                            <select name="platform" id="platform">
                                                <option value="Any">Any</option>
                                                @foreach($platforms as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <fieldset class="time_zone">
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
                                             <option value="Any">Any</option>
                                            @foreach(tz_list() as $t)                                               
                                                <option value="{{ $t['diff_from_GMT'] }} - {{$t['zone'] }}">
                                                    {{ $t['diff_from_GMT'] }} - {{$t['zone'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <fieldset class="game_mode">
                                        <label for="gamemode">Game Mode(s)</label>
                                        <select name="gamemode" id="gamemode">
                                            <option value="Any">Any</option>
                                            <option value="proam">Pro-Am</option>
                                            <option value="mypark">MyPark</option>
                                            <option value="teamup">Team-Up</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <input type="submit" value="Find Players" name="findplayers">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="player_stats_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="player_stats_inner">
                            <div class="play_add">
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
                            
    <div class="ps_box">
        <div class="row">
            <div class="col-md-6">
                <div class="ps_single top-ten">
                    <div class="psb_head">
                    <h4>Top 10 MyPLAYERs</h4>
                    </div>

                        <div class="psb_table">
                            <table>
                                <tr>
                                <th>RATING</th>
                                <th>PRIMARY</th>
                                <th>SECONDARY</th>
                                </tr>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($topplayers as $topplayer)
                                    @if($count <=10)
                                <tr>
                                <td><a href="/myplayer/{{$topplayer['id']}}">
<?php 
if($topplayer['current_rating'] == 99){
?>
<span class="rate higher">{{$topplayer['current_rating']}}</span>  
<?php
}else if(($topplayer['current_rating'] < 99) && ($topplayer['current_rating'] > 89)){ ?>
<span class="rate high">{{$topplayer['current_rating']}}</span>
<?php }
else if(($topplayer['current_rating'] < 90) && ($topplayer['current_rating'] > 79)){ ?>
<span class="rate avarage">{{$topplayer['current_rating']}}</span>
<?php
} else {?>
<span class="rate">{{$topplayer['current_rating']}}</span>

<?php }?>
                                </a> </td>

                            <td><a href="/myplayer/{{$topplayer['id']}}">{{$topplayer['primary_skills']}}</a></td>
                            <td><a href="/myplayer/{{$topplayer['id']}}">{{$topplayer['secondary_skills']}}</a></td>
                            <td><a href="/myplayer/{{$topplayer['id']}}" class="fa fa-search"></a></td>
                            </tr>
                            @endif
                            @php 
                            $count++;
                            @endphp
                            @endforeach
                            </table>
                        </div>

            <a href="/search-all-player" class="view-all">View all</a>

            </div>
    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="ps_single just-added">
                                            <div class="psb_head">
                                                <h4>Just Added MyPLAYERs</h4>
                                            </div>
                                        
                                            <div class="psb_table">
                                                <table>
                                                    <tr>
                                                        <th>RATING</th>
                                                        <th>PRIMARY</th>
                                                        <th>SECONDARY</th>
                                                    </tr>
                                            @php
                                            $count = 1;
                                            @endphp
                                             @foreach($justadded as $justadd)
                                             @if($count <=10)
                                            <tr>
                                   <td><a href="/myplayer/{{$justadd['id']}}">
                                  <?php 
if($justadd['current_rating'] == 99){
?>
<span class="rate higher">{{$justadd['current_rating']}}</span>  
<?php
}else if(($justadd['current_rating'] < 99) && ($justadd['current_rating'] > 89)){ ?>
<span class="rate high">{{$justadd['current_rating']}}</span>
<?php }
else if(($justadd['current_rating'] < 90) && ($justadd['current_rating'] > 79)){ ?>
<span class="rate avarage">{{$justadd['current_rating']}}</span>
<?php
} else {?>
<span class="rate">{{$justadd['current_rating']}}</span>

<?php }?>  
                                </a> </td>
                                <td><a href="/myplayer/{{$justadd['id']}}">{{$justadd['primary_skills']}}</a></td>
                                <td><a href="/myplayer/{{$justadd['id']}}">{{$justadd['secondary_skills']}}</a></td>
                                <td><a href="/myplayer/{{$justadd['id']}}" class="fa fa-search"></a></td>
                            </tr>
                                @endif
                               @php 
                               $count++;
                               @endphp
                                @endforeach
                                                    
                                </table>
                                            </div>
                                            
                                            <a href="/justadded" class="view-all">View all</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="play_add">
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
                    </div>
                </div>
            </div>
        </div>
        

@endsection