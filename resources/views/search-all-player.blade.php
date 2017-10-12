@extends('layouts.mainlayout')

@section('content')

       <div class="search_result_area">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="sr_inner">
                        
                        <?php $m_plyer = count($searchallplayers);?>
                         <?php if($m_plyer != 0){ ?>
                           <div class="sr_head text-center">
                               
                               <h2>We found <?php echo $m_plyer;?> possible teammates.</h2>
                               <p>Click a MyPlayer for detailed information.</p>
                               
                               <div class="reset">
                                   <a href="/" ><i class="fa fa-refresh"></i> RESET SEARCH</a>
                               </div>
                           </div>
                          
                      @if(Request::is('justadded'))
                    <div class="search_result_box">
                               <table>
                                  <tr>
                                      <th>POS <i class="fa fa-caret-down"></i></th>
                                      <th>RATING <i class="fa fa-caret-down"></i></th>
                                      <th>PRIMARY <i class="fa fa-caret-down"></i></th>
                                      <th>SECONDARY <i class="fa fa-caret-down"></i></th>
                                      <th>PLATFORM <i class="fa fa-caret-down"></i></th>
                                      <th>TIME ZONE <i class="fa fa-caret-down"></i></th>
                                      <th>GAMERTAG <i class="fa fa-caret-down"></i></th>
                                      <th>STATUS <i class="fa fa-caret-down"></i></th>
                                      <th>VERIFIED <i class="fa fa-caret-down"></i></th>
                                  </tr> 
                                  @foreach($justaddedplayers as $justaddedplayer)
                                  <tr>
                                    
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">{{$justaddedplayer['position']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">
                                      <?php 
                                        if($justaddedplayer['current_rating'] == 99){
                                          ?>
                                          <span class="rate higher">{{$justaddedplayer['current_rating']}}</span>  
                                          <?php
                                        }else if(($justaddedplayer['current_rating'] < 99) && ($justaddedplayer['current_rating'] > 89)){ ?>
                                        <span class="rate high">{{$justaddedplayer['current_rating']}}</span>
                                        <?php }
                                        else if(($justaddedplayer['current_rating'] < 90) && ($justaddedplayer['current_rating'] > 79)){ ?>
                                        <span class="rate avarage">{{$justaddedplayer['current_rating']}}</span>
                                        <?php
                                        } else {?>
                                        <span class="rate">{{$justaddedplayer['current_rating']}}</span>

                                        <?php }?>
                                      </a></td>
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">{{$justaddedplayer['primary_skills']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">{{$justaddedplayer['secondary_skills']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">{{$justaddedplayer['platform']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">{{$justaddedplayer['timezone']}}</a></td>

                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">{{$justaddedplayer['gametag']}}</a></td>

                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}">
                                    <?php $key = array_search($justaddedplayer['gametag'], array_column($allusers, 'gametag')); 
                                    ?>

                                      @if($allusers[$key]['online_status'] == 1)
                                      <span class="status">
                                        • ONLINE
                                      </span>
                                     
                                      @else
                                      <span class="offine">
                                       • OFFLINE
                                      </span>
                                      @endif
                                      </a></td>
                                      <td><a href="{{ route('myplayer',[$justaddedplayer['id']]) }}"><img src="img/viewed.png" alt=""></a></td>
                                  </tr>
                                  @endforeach
                               </table>
                           </div>
                    @else
                           <div class="search_result_box">
                               <table>
                                  <tr>
                                      <th>POS <i class="fa fa-caret-down"></i></th>
                                      <th>RATING <i class="fa fa-caret-down"></i></th>
                                      <th>PRIMARY <i class="fa fa-caret-down"></i></th>
                                      <th>SECONDARY <i class="fa fa-caret-down"></i></th>
                                      <th>PLATFORM <i class="fa fa-caret-down"></i></th>
                                      <th>TIME ZONE <i class="fa fa-caret-down"></i></th>
                                      <th>GAMERTAG <i class="fa fa-caret-down"></i></th>
                                      <th>STATUS <i class="fa fa-caret-down"></i></th>
                                      <th>VERIFIED <i class="fa fa-caret-down"></i></th>
                                  </tr> 
                                  @foreach($searchallplayers as $searchallplayer)
                                  <tr>
                                   
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">{{$searchallplayer['position']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">
                                      <?php 
                                        if($searchallplayer['current_rating'] == 99){
                                          ?>
                                          <span class="rate higher">{{$searchallplayer['current_rating']}}</span>  
                                          <?php
                                        }else if(($searchallplayer['current_rating'] < 99) && ($searchallplayer['current_rating'] > 89)){ ?>
                                        <span class="rate high">{{$searchallplayer['current_rating']}}</span>
                                        <?php }
                                        else if(($searchallplayer['current_rating'] < 90) && ($searchallplayer['current_rating'] > 79)){ ?>
                                        <span class="rate avarage">{{$searchallplayer['current_rating']}}</span>
                                        <?php
                                        } else {?>
                                        <span class="rate">{{$searchallplayer['current_rating']}}</span>

                                        <?php }?>
                                      </a></td>
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">{{$searchallplayer['primary_skills']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">{{$searchallplayer['secondary_skills']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">{{$searchallplayer['platform']}}</a></td>
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">{{$searchallplayer['timezone']}}</a></td>

                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">{{$searchallplayer['gametag']}}</a></td>

                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}">
                                      <?php $key = array_search($searchallplayer['gametag'], array_column($allusers, 'gametag')); 
                                    ?>

                                      @if($allusers[$key]['online_status'] == 1)
                                      <span class="status">
                                        • ONLINE
                                      </span>
                                      @else
                                      <span class="offine">
                                       • OFFLINE
                                      </span>
                                      @endif

                                      </a></td>
                                      <td><a href="{{ route('myplayer',[$searchallplayer['id']]) }}"><img src="img/viewed.png" alt=""></a></td>
                                  </tr>
                                  @endforeach
                               </table>
                           </div>
                           
              @endif
                           
                           <?php } else{ ?>
                           <div class="search_result_box sorry_box">
                            <h2>“Sorry, there are no MyPLAYERs available for this search.”</h2>
                           </div>
                           <?php }?>
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