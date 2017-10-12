<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="{{ app()->getLocale() }}"><!--<![endif]-->

<head>
	@include('layouts.head')
</head>
<body>
    <header class="header_area">
        
        <!-- Header top area start -->
         @include('layouts.header')
	</header>

	<main class="cd-main-content">
		 @yield('content')

	     <footer class="footer_area">
            @include('layouts.footer')
        </footer>
	</main> 
		<nav id="cd-lateral-nav">
            
        <ul class="cd-navigation">
            <li>Find a Free Agent:</li>
            <li><a href="">XBox One</a></li>
            <li><a href="">PS4</a></li>
            <li><a href="">PC</a></li>
            <li><a href="">XBox 360</a></li>
            <li><a href="">PS3</a></li>
            <li><a href="add-a-myplayer.html">Add Your MyPLAYER</a></li>
        </ul>
        
	</nav>
	
	<!-- Latest jQuery -->
  
  </body>
</html>