@extends('layouts.mainlayout')


@section('content')

<div class="settings_area">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="setting_inner">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if (Session::has('success'))
                            <div class="alert alert-success">{!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                        @endif
                           <div class="setting_head password_reset_head">
                               <h2>Reset Password</h2>
                           </div>
                                <div class="setting_box">
                               <div class="row">
                                   
                                   <div class="col-md-7">
                                       <div class="setting_box_left password_reset_btn">
                                           <form action="{{ route('password.email') }}" method="post" role="form" class="form-horizontal" >
                                            {{csrf_field()}}
                                               <h4>Enter Your Email Address</h4>
                                               
                                               <fieldset class="{{ $errors->has('old') ? ' has-error' : '' }}">
                                                 <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                                   <p>We Will send a password reset link in your email.</p>
                                               </fieldset>                                      
                                <input type="submit" value="Send Password Reset Link">
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

@endsection

