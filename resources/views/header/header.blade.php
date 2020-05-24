<!DOCTYPE html>
<html lang="en">
<head>
   <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ Session::token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no,shrink-to-fit=no">
    <meta name="csrf-token" content="{{ Session::token() }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="https://kit.fontawesome.com/f442ea367e.js"></script>
    <script src="{{asset('js/workscript.js')}}"></script>
    <link rel="stylesheet" href="{{asset('js/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css?v=2')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <script src="{{asset('js/wow.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery.min.js"></script>
    <script src="{{asset('js/lg-thumbnail.js')}}"></script>
    <script src="{{asset('js/lg-fullscreen.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('js/slick.css')}}">

	@yield('js')

       @yield('meta')



</head>
<body>
<script>new WOW().init();</script>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="logo-cont">
                        <a href="{{route('main')}}">
                            <div class="logo">
                                    Myblog
                            </div>
                        </a>
                    <div class="soc-cont">
                        <a href="#">
                        <div class="soc-item" data-type="soc1"></div>
                        </a>
                        <a href="#">
                        <div class="soc-item" data-type="soc2"></div>
                        </a>
                        <a href="#">
                        <div class="soc-item" data-type="soc3"></div>
                        </a>
                        <a href="#">
                        <div class="soc-item" data-type="soc4"></div>
                        </a>
                        <a href="#">
                        <div class="soc-item" data-type="soc5"></div>
                        </a>
                        <a href="#">
                        <div class="soc-item" data-type="soc6"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
            <div></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-6">
                @auth
                    <div class="admin-tools">
                        <a href="{{route('news.create')}}">
                            <span><i class="fas fa-plus-circle"></i> Добавить блог</span>
                        </a>
                    </div>
                @endauth
            </div>
            <div class="col-lg-4 hide"></div>
            <div class="col-lg-4 col-6">
                <div class="login">
                    @guest
                         <a href="{{ url('login') }}"  >
                        <span><i class="fas fa-sign-in-alt"></i> Логин</span>
                         </a>
                        <a href="{{ url('register') }}">
                            <span><i class="fas fa-user-plus"></i> регистрация </span>
                        </a>
                    @else
                        <a href="{{ url('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span><i class="fas fa-sign-out-alt"></i> Выход</span>
                        </a>
                        <a href="{{ url('register') }}">
                            <span> {{ Auth::user()->name }} </span>
                        </a>
                    @endguest

                </div>
            </div>
        </div>
    </div>

</header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@yield('content')
<script src="{{asset('js/bootstrap.min.js')}}" ></script>
<footer id="footer">

</footer>
</body>
</html>

