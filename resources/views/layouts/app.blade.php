<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head> 
  <meta name="description" content="Softwork official web site">
  <meta name="keywords" content="softwork, sofwork.herokuapp.com, icelake0, phone, repair, computer, tech, blog, forum" /> 
  <meta name="author" content=""> 
  <link href="css/prettyPhoto.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet"> 
  <link href="css/animate.css" rel="stylesheet"> 
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet"> 
  <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 
  <script src="js/respond.min.js"></script> <![endif]--> 
  <link rel="shortcut icon" href="images/ico/favicon.jpg"> 
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.jpg"> 
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.jpg"> 
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.jpg"> 
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.jpg">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Softwork') }}</title>
    <!-- Styles -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/momentjs/2.13.0/moment.min.js"></script>
      <link rel="stylesheet" href="css/mystyle.css">
	<!-- Piwik -->
	<script type="text/javascript">
	  var _paq = _paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
		var u="//oxtinwa.000webhostapp.com/";
		_paq.push(['setTrackerUrl', u+'piwik.php']);
		_paq.push(['setSiteId', '1']);
		var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<!-- End Piwik Code -->
</head>
<body>
  <div class="preloader">
    <div class="preloder-wrap">
      <div class="preloder-inner"> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div> 
        <div class="ball"></div>
      </div>
    </div>
  </div><!--/.preloader-->
  <header id="navigation"> 
    <div class="navbar navbar-inverse navbar-fixed-top" role="banner"> 
      <div class="container"> 
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
          </button> 
          <a class="navbar-brand" href="/"><h1><img src="images/logo.png" alt="logo" style='height:50px; width:100px'></h1></a> 
        </div> 
        <div class="collapse navbar-collapse"> 
          <ul class="nav navbar-nav navbar-right"> 
              <!--li class="scroll active"><a href="#navigation">Home</a></li-->
              <li><a href="#" data-toggle="modal" data-target="#reportFault ">Report Fault</a></li>
              <li><a href="/blog">softwork Tech Blog</a></li>
              <li><a href="/qanda">QandA Forum</a></li>
              <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">Electronics
                 <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li><a href="/under_dev">Basic Electronics Tutorial</a></li>
                   <li><a href="/under_dev">Adrino projects</a></li>
                   <li><a href="/under_dev">PIC projects</a></li>
                   <li><a href="/under_dev">Final year projects</a></li>
                  <li><a href="/under_dev">Electronics Designe Consultance</a></li>
               </ul>
             </li>
             @if (Auth::guest())
                            <li data-toggle="modal" data-target="#loginform"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li  data-toggle="modal" data-target="#sinupform"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li> <a href="#"></a> </li>
                        @else
                            <li><a href="/message"><span class="glyphicon glyphicon-envelope"></span> <span class="badge">{{Auth::user()->number_of_new_messages}}</span></a></li>
                            <li data-toggle="modal" data-target="#updateProfilePic"><a href="#" data-toggle="tooltip" data-placement="bottom" title="update avater"><img src="../images/profilePics/{{Auth::user()->profile_pic}}" alt='image' class="img-circle" alt="Cinque Terre" width="30" height="30"></a></li>
                            <li><a href="#">{{ Auth::user()->username }}</a></li>
                            <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                            <li> <a href="#"></a> </li>
                        @endif
          </ul> 
        </div> 
      </div> 
    </div><!--/navbar--> 
  </header> <!--/#navigation--> 


        <!--..................................models..................................-->
    <!-- login Modal -->
           <div class="modal fade" id="loginform" role="dialog">
             <div class="modal-dialog modal-sm">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style='background-color:#404040;'>
                  <button type="button" class="close" data-dismiss="modal"><span class='glyphicon glyphicon-remove' style='background-color:#FF5050'></span></button>
                  <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo" style='height:50px; width:100px'></a> 
                  <p style='font-size:20px;font-family:myFirstFont;color:#ffffff;'>Login</p>
                </div>
                <div class="modal-body">
                        <form class="form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                         
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>

                                <button type="submit" class="btn" style='background-color:#404040; color:#ffffff;'>
                                 <span class="glyphicon glyphicon-log-in"></span> Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                        
                    </form>
                        dont have an account yet?<a class="btn btn-link glyphicon glyphicon-user" data-toggle="modal" data-target="#sinupform" data-dismiss="modal">SignUp</a>
                </div>
              </div>
              
             </div>
           </div>
<!-- register Modal -->
           <div class="modal fade" id="sinupform" role="dialog">
             <div class="modal-dialog modal-sm">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style='background-color:#404040;'>
                  <button type="button" class="close" data-dismiss="modal"><span class='glyphicon glyphicon-remove' style='background-color:#FF5050'></span></button>
                    <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo" style='height:50px; width:100px'></a> 
                  <p style='font-size:20px;font-family:myFirstFont;color:#ffffff;'>Sign up</p>
                </div>
                <div class="modal-body">
                    <form class="form" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="control-label">Username</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="phonenumber" class="control-label">Phonenumber</label>
                            <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>

                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirm Password</label>
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                            <button type="submit" class="btn" style='background-color:#404040; color:#ffffff;'>
                                <span class="glyphicon glyphicon-user"></span>sign up
                            </button>
                    </form>
                        have an account already?<a class="btn btn-link glyphicon glyphicon-log-in" data-toggle="modal" data-target="#loginform" data-dismiss="modal">login</a>
                </div>
              </div>
              
             </div>
           </div>
           <!-- report a fault Modal -->
           <div class="modal fade" id="reportFault" role="dialog">
             <div class="modal-dialog modal-md">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style='background-color:#404040;'>
                  <button type="button" class="close" data-dismiss="modal"><span class='glyphicon glyphicon-remove' style='background-color:#FF5050'></span></button>                  
                  <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo" style='height:50px; width:100px'></a> 
                  <p style='font-size:20px;font-family:myFirstFont;color:#ffffff;'>Report A Fault</p>
                </div>
                <div class="modal-body">
                        <form role="form" method='post' action='/report_fault'>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="faultdescription">Give a general description of the problem:</label>
                                <textarea type="text" class="form-control" name='faultdescription' id="faultdescription"></textarea>
                             </div>
                              <button type="submit" class="btn" style='background-color:#404040; color:#ffffff;'>submit</button>
                        </form>
                        you will get a fallowup message from softwork
                </div>
              </div>
              
             </div>
           </div>

           <!-- update profilrpic a fault Modal -->
           <div class="modal fade" id="updateProfilePic" role="dialog">
             <div class="modal-dialog modal-md">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style='background-color:#404040;'>
                  <button type="button" class="close" data-dismiss="modal"><span class='glyphicon glyphicon-remove' style='background-color:#FF5050'></span></button>
                    <a class="navbar-brand" href="/"><img src="images/logo.png" alt="logo" style='height:50px; width:100px'></a> 
                  <p style='font-size:20px;font-family:myFirstFont;color:#ffffff;'>Update Profile Picture</p>
                </div>
                <div class="modal-body">
                        <form method="post" action ='/update_profilepic' files='true' enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <legend>Update Profile Picture</legend>
                            <label for="faultdescription">Select image to upload:</label>
                            <input type="file" name="image" id="image">
                            <button type="submit" class="btn" style='background-color:#404040; color:#ffffff;'>Update Pic</button>
                        </form>
                        <label for="faultdescription" id='upload_error_report' style='color:red;'>...</label>
                </div>
              </div>
              
             </div>
           </div>

   <!--..................................end of models..................................-->
        <br/><br/>
        @yield('content')
        <footer id="footer"> 
    <div class="container"> 
      <div class='text-center'> 
                    <p>Unless otherwise noted, all content copyright softwork.</p> 
                    <p>All rights reserved. softwork &copy 2017</p>
                </div>
    </div> 
  </footer> <!--/#footer--> 
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script> 
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
  <script type="text/javascript" src="js/jquery.parallax.js"></script> 
  <script type="text/javascript" src="js/main.js"></script> 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <?php
        if(!isset(Auth::user()->id))
        {
          echo'
            <script>
              $(document).ready(function(){
                $("#loginform").modal();
              });
            </script>
            ';
          }
         if(isset($pp_upload_error)&& $pp_upload_error!=='')
         {
          echo"
            <script>
              $(document).ready(function(){

                document.getElementById('upload_error_report').innerHTML='{$pp_upload_error}'
                $('#updateProfilePic').modal();
              });
            </script>
            ";
        }
      ?>
</body>
</html>
