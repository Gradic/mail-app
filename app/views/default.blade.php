<!DOCTYPE html>
<html>
<head>
    <title>Mail App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('fav.png') }}">
    {{ HTML::script('js/jquery-2.1.3.min.js') }}
    {{HTML::style('bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('css/style.css')}}
</head>
<body>
<div class="page">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Mail App</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                        <li><a href="{{ url('logout') }}">Atsijungti</a></li>
                        @else
                        <li><a href="{{ url('login') }}">Prisijungti</a></li>
                        @endif
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    
    <div class="container">
<div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Meniu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="{{{ (Request::is('post/create') ? 'active' : '') }}}"><a href="{{ url('post/create') }}">Kurti naujienlaiškį</a></li>
            <li class="{{{ (Request::is('email/create') ? 'active' : '') }}}"><a href="{{ url('email/create') }}">Pridėti el. paštą</a></li>
            <li class="{{{ (Request::is('email') ? 'active' : '') }}}{{{ (Request::is('email/*/edit') ? 'active' : '') }}}"><a href="{{ url('email') }}">Visi adresai <span class="badge"> {{ Email::count() }} </span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
   @if(Session::has('messageSuccess'))
            <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
           {{ Session::get('messageSuccess') }}
            </div>
   @endif
     @yield('body')
  </div>
</div> 
          
          
    </div>
</div>
{{HTML::script('bootstrap/js/bootstrap.min.js')}}
@show
</body>
</html>