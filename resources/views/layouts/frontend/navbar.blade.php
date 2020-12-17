<div class="scrolling-navbar fixed-top">
    <div class="row">
        <div class="col-md-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light" style="background: white">
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
                                <a href="{{ route('cart.index')}}" class="nav-link text-dark">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                                    <span class="basket-item-count">
                                        <span class="badge badge-pill badge-danger"> 0 </span>
                                    </span>
                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link text-dark" data-toggle="modal" data-target="#loginModal" href="#">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
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
        <div class="col-md-12 py-1 bg-dark shadow-none">
            <div class="container-fluid">
                @php
                $groups = DB::select('select * from groups')
            @endphp
            @foreach ($groups as $group)
                <a href="{{ route('collection.groupview', $group->slug)}}" class="px-4 text-white">{{ $group->name}}</a>
            @endforeach
            </div>
        </div>
    </div>
</div>

<!-- MODAL LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login')}}" class="user" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email Address..." value="{{ old('email')}}" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                </form>
                <hr>
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                @endif
                <div class="text-center">
                    <a class="small" href="{{ route('register')}}">Create an Account!</a>
                </div>
            </div>
        </div>
    </div>
</div>
