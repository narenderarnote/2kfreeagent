@extends('layouts.mainlayout')

@section('content')
       <div class="login_area">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="login_inner">
                           <div class="row">
                               <div class="col-md-6 col-sm-6">
                                   <div class="log_in log_sign">
                                      <h2>Log In</h2> 
                                      <p>Log into your account to appear online to 2K players and make updates to your MyPLAYER.</p>
                                      
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                          
                    <fieldset class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="jackpotsoftware@gmail.com" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </fieldset>
                    <fieldset class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        <a href="/forgotpassword">Forgot Your Password?
                        </a>      
                    </fieldset>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > Remember Me
                <input type="submit" value="Log In" name="login">
                        </form>
                    </div>
             </div>
                               
                               
                               <div class="col-md-6 col-sm-6">
                                   <div class="sign_up log_sign">
                                        <h2>Sign Up</h2> 
                                      <p>Sign up to add your MyPLAYER to our extensive database of potential teammates!</p>
                                      
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <!--fieldset class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                      <label for="name">Name</label>
                                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </fieldset-->
                        <fieldset class="{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email">Email Address</label>
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </fieldset>
                          <fieldset class="{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password">Password</label>
                              <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </fieldset>
                          <fieldset>
                              <label for="newpassword">Confirm New Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </fieldset>
                          <fieldset>
                            <label for="gametag">Gamertag</label>
                              <input class="form-control" name="gametag" type="text" id="gametag" required>
                               @if ($errors->has('gametag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gametag') }}</strong>
                                    </span>
                                @endif
                          </fieldset>
                        <input type="submit" value="Sign Up" name="signup">
                                      </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>    
@endsection
