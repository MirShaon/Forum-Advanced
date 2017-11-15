<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ForumRuCSE') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atelier-cave-dark.min.css">

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ForumRuCSE') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

 </div>       
       

          <div class="container">
            <div class="row">
                 <div class="col-md-4">

                      <a href="{{ route('discussions.create')}}" class="form-control btn btn-primary">Create a new Discussion</a>
                      <br>
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                   
                                     <li class="list-group-item">
                                         <a href="/forum">Home</a>
                                     </li>
                                     <li class="list-group-item">
                                         <a href="/forum?filter=me">My Discussion</a>
                                     </li>
                                     <li class="list-group-item">
                                         <a href="/forum?filter=solved">Answered Discussion</a>
                                     </li> 
                                     <li class="list-group-item">
                                         <a href="/forum?filter=unsolved">Unanswered Discussion</a>
                                     </li>

                                </ul>
                            </div>


                      @if( Auth::check() )
                         @if(Auth::user()->admin)
                               <div class="panel-body">
                                 <div class="list-group">
                                    <li class="list-group-item">
                                      <a href="/channels">All Channel</a>
                                    </li>
                                 </div>
                               </div>

                            @endif
                      @endif
                            
                        </div>

                        <a href="{{ route('channels.create')}}" class="form-control btn btn-primary">Create a new Channel</a>
                      <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Channels
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    @foreach($channels as $channel)
                                    <li class="list-group-item">
                                         

                               
                                      <a href="{{ route('channel',['slug'=>$channel->slug])}}">{{ $channel->title }}</a>  
                                  

                                  
                                    </li>
                                      @endforeach
                                   
                                </ul>
                            </div>
                        </div>

                  
              </div>
              <div class="col-md-8">
                 @yield('content') 
              </div>
                
            </div>
             
          </div>


    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js">
      
    </script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script>
         @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
          @endif
        
    </script>
    @yield('scripts')

</body>
</html>
