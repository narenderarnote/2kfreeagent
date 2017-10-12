@extends('layouts.mainlayout')

@section ('css')
@endsection

@section('content')
<div class="settings_area">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="setting_inner">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                        @endif
                           <div class="setting_head">
                               <h2>Settings</h2>
                           </div>
                           
                           <div class="setting_box">
                               <div class="row">
                                   <div class="col-md-5">
                                       <div class="setting_box_left">
                                           <h4>Gamertag</h4> 
                                           <p>{{ Auth::user()->gametag }} <a href="javascript:void(0)" class="edit-gametag"><img src="img/settings-icon.png" alt=""></a></p>
                                           <form class="update-gametage" style="display:none;" method="post" action="{{ route('update-gametag') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="old_gametag" value="{{ Auth::user()->gametag }}" />
                                               <input type="text" name="gametag" value="{{ Auth::user()->gametag }}" />
                                               <input class="update_gamtag" type="submit" value="Update" name="update-game-tag" />
                                           </form>@if($errors->first('gametag'))
                                                <span style="color:red">{{ $errors->first('gametag') }}</span>
                                               @endif
                                            <h4>Your Time Zone</h4> 
                                            <p>Eastern Standard Time (EST) <a href=""><img src="img/settings-icon.png" alt=""></a></p>  
                                       </div>
                                   </div>
                                   <div class="col-md-7">
                                       <div class="setting_box_left">
                                           <form action="" method="post" role="form" class="form-horizontal">
                                            {{csrf_field()}}
                                               <h4>Change Password</h4>
                                               
                                               <fieldset class="{{ $errors->has('old') ? ' has-error' : '' }}">
                                                   <label for="password">Your Existing Password</label>
                                                   <input id="password" type="password" class="form-control" name="old">
                                                @if ($errors->has('old'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('old') }}</strong>
                                                    </span>
                                                @endif
                                                   <p>For security reasons, you must verify your existing password before you may set a new password.</p>
                                               </fieldset>
                                               
                                               <fieldset class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                                   <label for="newpassword">New Password</label>
                                                   <input id="password" type="password" class="form-control" name="password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                               </fieldset>
                                               
                                        <fieldset class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="conpassword">Confirm New Password</label>
                                                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </fieldset>                                              
                                <input type="submit" value="Save Changes">
                                           </form>
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
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
        $(document).ready(function(){
            $('.edit-gametag').click(function(){
                //alert('hello');
                $(this).parent('p').hide();
                $('.update-gametage').show();
            });
        });
    </script>
@endsection

@section('scripts')

@endsection