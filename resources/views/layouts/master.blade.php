<!doctype html>
<html lang="en">

<head>
    <title>Akny Matrimony</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#f6af04">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="{{ asset('images/fav.ico') }}" type="image/x-icon">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.min.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="plod">
            <span class="lod1"><img src="{{ asset('images/loder/1.png') }}" alt="" loading="lazy"></span>
            <span class="lod2"><img src="{{ asset('images/loder/2.png') }}" alt="" loading="lazy"></span>
            <span class="lod3"><img src="{{ asset('images/loder/3.png') }}" alt="" loading="lazy"></span>
        </div>
    </div>
    <div class="pop-bg"></div>
    <!-- END PRELOADER -->

    <!-- POPUP SEARCH -->
    <div class="pop-search">
        <span class="ser-clo">+</span>
        <div class="inn">
            <form>
                <input type="text" placeholder="Search here...">
            </form>
            <div class="rel-sear">
                <h4>Top searches:</h4>
                <a href="all-profiles.html">Browse all profiles</a>
                <a href="all-profiles.html">Mens profile</a>
                <a href="all-profiles.html">Female profile</a>
                <a href="all-profiles.html">New profiles</a>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- MENU POPUP -->
    <div class="menu-pop menu-pop1">
        <span class="menu-pop-clo"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="inn">
            <img src="https://aknymatrimony.com/wp-content/uploads/2024/06/Untitled-design-e1717264338223.png" alt="" loading="lazy" class="logo-brand-only">
            <strong>Akny Matrimo</strong>
            <p><strong>Best Wedding Matrimony</strong> lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="menu-pop-info">
                <li><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i>+92 (8800) 68 - 8960</a></li>
                <li><a href="#!"><i class="fa fa-envelope-o" aria-hidden="true"></i>help@company.com</a></li>
                <li><a href="#!"><i class="fa fa-map-marker" aria-hidden="true"></i>3812 Lena Lane City Jackson Mississippi</a></li>
            </ul>
            <div class="menu-pop-help">
                <h4>Support Team</h4>
                <div class="user-pro">
                    <img src="{{ asset('images/profiles/1.jpg') }}" alt="" loading="lazy">
                </div>
                <div class="user-bio">
                    <h5>Ashley emyy</h5>
                    <span>Senior personal advisor</span>
                    <a href="enquiry.html" class="btn btn-primary btn-sm">Ask your doubts</a>
                </div>
            </div>
            <div class="menu-pop-soci">
                <ul>
                    <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="#!"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- MAIN MENU -->
    <div class="hom-top">
        <div class="container">
            <div class="row">
                <div class="hom-nav">
                    <!-- LOGO -->
                    <div class="logo">
                        <span class="menu desk-menu"><i></i><i></i><i></i></span>
                        <a href="index.html" class="logo-brand">
                            <img src="https://aknymatrimony.com/wp-content/uploads/2024/06/Untitled-design-e1717264338223.png" alt="" loading="lazy" class="ic-logo">
                        </a>
                    </div>

                    <!-- NAVIGATION -->
                    <div class="bl">
                        <ul>
                            <li class="smenu-pare"><span class="smenu">Explore</span></li>
                            <li><a href="plans.html">Plans</a></li>
                            <li><a href="/signup">Register</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- USER PROFILE -->
                    <div class="al">
                        <div class="head-pro">
                            @if(Session::has('user_id'))
                                @php $user = \App\Models\Users::find(Session::get('user_id')); @endphp
                                <a href="{{ url('/profile') }}">
                                    <img src="{{ asset('images/profiles/1.jpg') }}" alt="Profile" style="border-radius: 50%;" loading="lazy">
                                </a>
                                <b>{{ $user->role ?? 'User' }}</b><br>
                                <h4>{{ $user->name }}</h4>
                            @else
                                <img src="{{ asset('images/profiles/1.jpg') }}" style="border-radius: 50%;" loading="lazy">
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    @yield('content')

    <!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <div class="row foot-supp">
                <h2><span>Free support:</span> +92 (8800) 68 - 8960 &nbsp;&nbsp;|&nbsp;&nbsp; <span>Email:</span> info@example.com</h2>
            </div>
        </div>
    </section>

    <!-- COPYRIGHTS -->
    <section>
        <div class="cr">
            <div class="container">
                <div class="row">
                    <p>Copyright © <span id="cry">2025</span> <a href="#!" target="_blank">AgnyItSolutions.com</a> All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- JS FILES -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select-opt.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
