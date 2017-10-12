<div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hta_inner">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <div class="logo">
                                        <a href="/">
                                            <img src="/img/logo.png" alt="2KFreeAgent">
                                        </a>
                                    </div>
                                </div>               
                @if(Auth::check())
                        <div class="col-md-6 col-xs-6">
                                    <div class="hta_right">
                                        <a id="geckzu">{{ucfirst(Auth::user()->gametag) }} <i class="fa fa-caret-down"></i></a>
                                        
                                        <ul class="geckzu-dropdown">
                                            <li><a href="/settings">Settings</a></li>
                                            <li><a href="/editmyplayer">Edit a MyPlayer</a></li>
                                            <li><a href="{{ url('userLogout') }}" >
                                            Logout
                                        </a></li>
                                        </ul>
                                    </div>
                        </div>
                
                               @else 
                                <div class="col-md-6 col-xs-6">
                                    <div class="hta_right">
                                        <a href="/login">log in / sign up</a>
                                    </div>
                                </div>
                                 @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header top area start -->
        
        <nav class="header_nav_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hna_inner">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="hna_left">
                                        @if(Auth::check())
                                        <a href="/addmyplayer">Add Your MyPLAYER</a>
                                        @else
                                        <a href="/login">Add Your MyPLAYER</a>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-8 col-sm-8">
                                    <div class="hna_right">
                                        <ul>
                                            <li>Find a Free Agent:</li>
                                            <li><a href="{{ route('platefome-name',['XBox-One']) }}">Xbox One</a></li>
                                            <li><a href="{{ route('platefome-name',['PS4']) }}">PS4</a></li>
                                            <li><a href="{{ route('platefome-name',['PC']) }}">PC</a></li>
                                            <li><a href="{{ route('platefome-name',['XBox-360']) }}">XBox 360</a></li>
                                            <li><a href="{{ route('platefome-name',['PS3']) }}">PS3</a></li>
                                            <li><a href="{{ route('platefome-name',['Switch']) }}">Switch</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
		
		<!-- Nav for mobile trigger -->
		<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span></a>