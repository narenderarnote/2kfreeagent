@extends('layouts.mainlayout')

@section('content')

       <div class="search_result_area edit-a-myplayer">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="sr_inner">
                        <?php $count = count($players);?>
                          <?php if($count != 0) { ?>
                           <div class="sr_head text-center">
                               <h2>Edit a MyPLAYER</h2>
                           </div>
                           @if (\Session::has('success'))
                            <div class="alert alert-success">
                              <p>{{ \Session::get('success') }}</p>
                            </div><br />
                           @endif
                           <div class="search_result_box">
                               <table>
                                  <tr>
                                      <th>POS <i class="fa fa-caret-down"></i></th>
                                      <th>RATING <i class="fa fa-caret-down"></i></th>
                                      <th>MYPLAYER NAME <i class="fa fa-caret-down"></i></th>
                                      <th>PRIMARY <i class="fa fa-caret-down"></i></th>
                                      <th>SECONDARY <i class="fa fa-caret-down"></i></th>
                                      <th>LAST UPDATED <i class="fa fa-caret-down"></i></th>
                                      <th>LAST VERIFIED <i class="fa fa-caret-down"></i></th>
                                      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
               
              <?php //$count = 1;?>                    </tr> 
              @foreach($players as $player)
              @if($player['player_adder_id'] == Auth::user()->id)
                 <tr>
                    <td><a href="/myplayer/{{$player['id']}}">{{$player['position']}}</a></td>
                    @if($player['current_rating'] == '99')
                    <td><a href="/myplayer/{{$player['id']}}"><span class="rate higher">{{$player['current_rating']}}</span></a></td>
                    @else
                    <td><a href="/myplayer/{{$player['id']}}"><span class="rate high">{{$player['current_rating']}}</span></a></td>
                    @endif
                    <td><a href="/myplayer/{{$player['id']}}">{{$player['name']}}</a></td>
                    <td><a href="/myplayer/{{$player['id']}}">{{$player['primary_skills']}}</a></td>
                    <td><a href="/myplayer/{{$player['id']}}">{{$player['secondary_skills']}}</a></td>
                    <td><a href="/myplayer/{{$player['id']}}">{{date("d/m/Y", strtotime($player['updated_at']))}}</a></td>
                    <td><a href="/myplayer/{{$player['id']}}">9/2/17</a></td>
                    
                    <td>
                      <a href="/editsingleplayer/{{$player['id']}}"><img src="img/settings-icon.png" alt=""></a>
                      <a href="/editmyplayer/{{$player['id']}}"><img src="img/delete.png" alt=""></a>
                    </td>
                  </tr>
                  @endif
                @endforeach  
            </table>
                               
                              
                           </div>
                            <?php } else { ?>
                            <div class="sr_head text-center">
                               <h2>“Sorry, there are no MyPLAYERs available to edit.”</h2>
                           </div>
                           <?php } ?>
                            <a href="/addmyplayer" class="add_a_myplayer">Add a MyPLAYER</a>
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