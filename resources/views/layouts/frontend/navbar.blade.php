<div class="white scrolling-navbar fixed-top">
    <div class="row">
        <div class="col-md-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand -->
                    <a class="navbar-brand waves-effect" href="{{ route('home')}}"">
                        <strong class="blue-text" style="font-size: 28px">AMINOUS IND</strong>
                    </a>
                
                    <!-- Collapse -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right -->
                        <ul class="navbar-nav nav-flex-icons ml-auto">
                            <li class="nav-item">
                                <a class="nav-link waves-effect">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                                    <span class="badge badge-pill red z-depth-1"> 1 </span>
                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link waves-effect" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link waves-effect" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('my-profile')}}" class="dropdown-item">My Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 py-1 bg-info shadow">
            @php
                $groups = DB::select('select * from groups')
            @endphp
            @foreach ($groups as $group)
                <a href="" class="text-white waves-effect" style="margin-left: 30px">{{ $group->name}}</a>
            @endforeach
        </div>
    </div>
</div>
