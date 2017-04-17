<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->  
    <link href="/css/app.css" rel="stylesheet">
    


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
            
                         @if (Auth::user())
                             @if (Auth::User()->role=="admin")                    
                                    {{  'Admin Panal' }}
                               @else
                                    {{ 'SecureBloc'}}
                             @endif
                         @endif  

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;

                        @if (Auth::user())
                          @if (Auth::User()->role=="admin")
                          <li><a href="{{ url('/users') }}">Users</a></li>
                          @endif
                          <li><a href="{{ url('/posts/create') }}">Create Post</a></li>
                          <li><a href="{{ url('/posts') }}">Posts</a></li>
                          <li><a href="{{ url('/posts/myposts') }}">Myposts</a></li>
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->




                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ url('posts/search') }}">Search</a></li>                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <!-- image -->
                                      
                                     <span><img src={{ Storage::url(Auth::user()->dp_url) }} style="width:25px;height:25px;border-radius:50%;"></span>
                                     <span class="caret"></span>
                                    
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                 


                                    <li>
                                      <a href="{{ url('/edit-profile') }}">Edit Profile </a>
                                    </li>                                    

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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    
    <script src="/js/app.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>




    <script src="/js/my.js"></script>




    
</body>
</html>
