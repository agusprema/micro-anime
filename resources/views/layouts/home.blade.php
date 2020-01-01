<!doctype html>
<html lang="en" itemscope="itemscope" itemtype="@if (url()->full() !== url('/')){{__('http://schema.org/Article')}}@else{{__('http://schema.org/WebPage')}}@endif" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <head profile="http://gmpg.org/xfn/11">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('img/logo_web.ico')}}">
        <link rel="alternate" hreflang="id" href="{{ url()->full() }}" />
        <meta name="robots" content="noodp"/>

        <title>@yield('title')Micro Anime | Nonton Anime Subtitle Indonesia</title>
        <meta name="description" content="Nonton streaming anime subtitle indonesia, download anime sub indo samehadaku"/>

        <meta property="og:locale" content="id_ID" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="@yield('title')Micro Anime | Nonton Anime Subtitle Indonesia" />
        <meta property="og:description" content="Nonton streaming anime subtitle indonesia, download anime sub indo samehadaku" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:site_name" content="Micro Anime" />

        <meta property="twitter:card" content="summary" />
        <meta property="twitter:title" content="@yield('title')Micro Anime | Nonton Anime Subtitle Indonesia" />
        <meta property="twitter:description" content="Nonton streaming anime subtitle indonesia, download anime sub indo samehadaku" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="{{ asset('css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="url-full" content="{{ url()->full() }}">
        <meta name="url" content="{{ url('/') }}">
        <style>@media (max-width: 400px){.content-calendar img,.box-post img{min-height: 155px !important; max-height: 155px !important;}} @media (max-width: 335px){.col-md-2-a {-ms-flex: 0 0 50%;flex: 0 0 50%;max-width: 50%;}.content-calendar img,.box-post img{min-height: 200px !important;max-height: 200px !important;}.label-hot, .label-new {font-size: 10px;font-weight: 600;line-height: 14px;}}</style>

    </head>
    <body id="page-top" itemscope="itemscope" itemtype="http://schema.org/WebPage">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v4.0&appId=130276754472583&autoLogAppEvents=1"></script>
        <div id="app" style="display:none">
            <h2>nonton</h2><h2>nonton online</h2><h2>nonton anime sub indo</h2><h2>nonton anime subtitle indonesia</h2><h2>nonton anime bahasa indonesia</h2><h3>nonton anime online</h3><h2>nonton gratis anime</h2><h3>nonton</h3><h3>nonton gratis anime</h3><h3>nonton online</h3><h2>download</h2><h2>download online</h2><h2>download anime sub indo</h2><h2>download anime subtitle indonesia</h2><h2>download anime bahasa indonesia</h2><h3>download anime online</h3><h2>download gratis anime</h2><h3>download</h3><h3>download gratis anime</h3><h3>download online</h3><h2>streaming </h2><h2>streaming online</h2><h2>streaming anime sub indo</h2><h2>streaming anime subtitle indonesia</h2><h2>streaming anime bahasa indonesia</h2><h3>streaming anime online</h3><h2>streaming gratis anime</h2><h3>streaming</h3><h3>streaming gratis anime</h3><h3>streaming online</h3>
        </div>

        <!-- Header -->
        <header itemscope itemtype="http://schema.org/WPHeader">
            <div id="banner" class="container-fluid p-0">
                <!-- Navbar -->
                <nav id="navscroll" class="navbar shadow-lg navbar-expand-lg navbar-dark bg-dark">
                    <!-- Navbar content -->
                    <div class="container">
                        <a class="navbar-brand" style="font-size: 1.1rem;" href=""><img itemprop="logo" itemscope="itemscope" itemtype="http://schema.org/Brand" width="90px" src="{{ asset('img/logo_header.png') }}" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            <ul class="navbar-nav mr-auto">
                                <!-- Navbar link -->
                                <li class="nav-item @if (url('/') == url()->full())active @endif"><a class="nav-link" href="{{ url('/') }}" itemprop="url">Home<span class="sr-only">(current)</span></a></li>
                                <li class="nav-item @if (url('/ongoing') == url()->full())active @endif"><a class="nav-link" href="{{ url('/ongoing') }}" itemprop="url">Ongoing</a></li>
                                <li class="nav-item @if (url('/tamat') == url()->full())active @endif"><a class="nav-link" href="{{ url('/tamat') }}" itemprop="url">Tamat</a></li>
                                <li class="nav-item @if (url('/list-anime') == url()->full())active @endif"><a class="nav-link" href="{{ url('/list-anime') }}" itemprop="url">List Anime</a></li>
                                <li class="nav-item @if (url('/archive/genre') == url()->full())active @endif"><a class="nav-link" href="{{ url('/archive/genre') }}" itemprop="url">Genre</a></li>
                                <li class="nav-item @if (url('/jadwal') == url()->full())active @endif"><a class="nav-link" href="{{ url('/jadwal') }}" itemprop="url">Jadwal Rilis</a></li>
                                @guest
                                <li class="nav-item "><a class="nav-link" id="login" href="">Login</a></li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">{{ __('Logout') }}</a>
                                </li>
                                @endguest
                                <!-- Navbar link -->
                            </ul>
                            @guest
                            @else
                            <ul class="navbar-nav">
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-lg-inline">{{ Auth::user()->name }}</span>
                                        <img class="img-profile rounded-circle" src="{{ Storage::url('user/profile/' . Auth::user()->profile_image) }}">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{ url('user/bookmark-anime') }}"><i class="fas fa-bookmark fa-sm fa-fw mr-2 text-gray-400"></i>Bookmark Anime</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('user.home') }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>My Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ url('user/edit-profile') }}"><i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>Edit Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">Logout</a>
                                    </div>
                                    <!-- Dropdown - User Information -->
                                </li>
                                <!-- Nav Item - User Information -->
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="url" value="{{ url()->full() }}">
                            </form>
                            @endguest
                            <form class="form-inline my-2 my-lg-0" action="{{ url('/') }}" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
                                <input itemprop="query-input" class="form-control mr-sm-2" type="search" name="s" placeholder="Search" aria-label="Search"><button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Navbar content -->
                </nav>
                <!-- Navbar -->
            </div>
        </header>
        <!-- Header -->

        <!-- Main -->
        <main>
            <div class="container">
                <!-- Ads Banner -->
                <div class="col-md-12 p-0 pb-2 mt-2">
                    <div class="mb-2">
                        @foreach (\DB::table('ads_banners')->where('type_for', 'home')->orderBy('id', 'desc')->limit(4)->get() as $ads_home)
                        <a class="" target="_blank" href="{{ $ads_home->url }}" title="{{ $ads_home->title }}"><img class="ads_banner" src="{{ $ads_home->image }}" alt="{{ $ads_home->title }}" title="{{ $ads_home->title }}"></a>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Ads Banner -->

                <!-- big sidebar -->
                <div class="col-lg-9 float-left pl-0 plr-0">
                    <!-- Slider -->
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner inner-slider">
                            @foreach (\DB::table('slider_animes')->join('detail_animes', 'slider_animes.id_anime', '=', 'detail_animes.id_anime')->orderBy('slider_animes.id', 'DESC')->get() as $slider)
                            <div class="carousel-item @if ($loop->iteration == 1)active @endif">
                                <div class="col-md-12 p-0">
                                    <div class="col-sm-9 info-slider-box p-0 pb-2 pt-2 float-left text-white">
                                        <div class="box-rat pb-1">
                                            <div class="ratting-slider text-center float-left pr-2 pt-2"><div class="rat-slider"><span>{{ $slider->rating_anime }}</span></div></div>
                                            <div class="title-slider text-uppercase"><a href="{{ $slider->id_anime }}" title="{{ $slider->title_anime }}">{{ $slider->title_anime }}</a></div>
                                            <div class="type-post-slider text-capitalize text-primary"><span class="text-white text-monospace">Type : </span><span class="text-uppercase">{{ $slider->type_anime }}</span></div>
                                            <div class="genre-post-slider text-capitalize text-secondary">
                                                <span class="text-white text-monospace">Genres : </span>
                                                @foreach (explode(",", $slider->genre_anime) as $genre)
                                                <a class="text-secondary" title="{{ $genre }}" href="{{ url('/archive/genre') . '/' . strtolower(str_replace(",", "", $genre)) }}">{{ $genre }}</a>,
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="summary-slider text-uppercase pb-1"><strong>Summary</strong></div>
                                        <div class="sinopsis-slider"><p class="text-justify text-capitalize">{{ $slider->summary_anime }}</p></div>
                                        <div class="status-slider pt-1 text-capitalize"><span><strong>Status : </strong>{{ $slider->status_anime }}</span></div>
                                    </div>
                                    <div class="col-sm-2 mt-3 image-slider float-left">
                                        <a href="{{ url('/anime') . '/' . $slider->id_anime }}" title="{{ $slider->title_anime }}"><img src="{{ $slider->image_anime }}" title="{{ $slider->title_anime }}" class="d-block w-100" alt="{{ $slider->title_anime }}"></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <a class="carousel-control-prev" style="width: 5%;" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" style="width: 5%;" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- Slider -->

                    <!-- Announcements -->
                    @foreach (\DB::table('announcements')->where('type_for', 'user')->get() as $alert)
                    <div class="alert alert-{{$alert->type}} mt-2 mb-2" role="alert"><i class="fas fa-bell"></i>: {{ $alert->announcement }}</div>
                    @endforeach
                    <!-- Announcements -->

                    <!-- Ads Banner -->
                    <div class="col-md-12 p-0 mb-2">
                        @foreach (\DB::table('ads_banners')->where('type_for', 'announcements')->orderBy('id', 'desc')->limit(1)->get() as $ads_home)
                        <a class="" target="_blank" href="{{ $ads_home->url }}" title="{{ $ads_home->title }}"><img class="w-100" src="{{ $ads_home->image }}" alt="{{ $ads_home->title }}" title="{{ $ads_home->title }}"></a>
                        @endforeach
                    </div>
                    <!-- Ads Banner -->

                    <!-- Anime Complate -->
                    <div class="col-md-12 bg-dark mt-1 pb-2">
                        <div class="title-widget mb-2"><i class="fas fa-tasks text-success pr-1"></i><span class="text-white">Anime Complete</span><a class="float-right more-tamat" title="More" href="tamat/">More</a></div>
                        @foreach (\DB::table('detail_animes')->where('status_anime', 'Tamat')->orderBy('id', 'desc')->limit(6)->get() as $tamat_box)
                        <div class="col-md-2 box-tamat p-1 float-left">
                            <a href="{{ url('/anime') . '/' . $tamat_box->id_anime }}" title="{{ $tamat_box->title_anime }}">
                                <img data-src="{{ $tamat_box->image_anime }}" title="{{ $tamat_box->title_anime }}">
                                <div class="title-tamat">{{ $tamat_box->title_anime }}</div>
                            </a>
                            @if ($tamat_box->status_anime == 'Tamat')<div class="label-tamat text-white">Tamat</div>@else<div class="label-ongoing text-white">Ongoing</div>@endif

                            <?php $episode = \DB::table('episode_animes')->where('id_anime', $tamat_box->id_anime)->count(); ?>
                            <div class="label-episode-right text-white">Episode {{ $episode }}</div>

                            <div class="label-box">
                                {!! App\Helpers\AnimeLabelHelper::instance()->label_hot($tamat_box->id_anime) !!}
                                {!! App\Helpers\AnimeLabelHelper::instance()->label_new($tamat_box->id_anime) !!}
                            </div>
                        </div>
                        @endforeach

                        <div class="clearfix"></div>
                    </div>
                    <!-- Anime Complate -->

                    <!-- Main Content -->
                    <div class="col-md-12 bg-dark mt-1 mb-1 pb-2">
                        @yield('content')
                    </div>
                    <!-- Main Content -->

                </div>
                <!-- big sidebar -->

                <!-- Sidebar -->
                <div class="col-md-3 box-sidebar float-right bg-dark text-white">
                    <div class="box-genre-sidebar pt-1">
                        <div class="title-widget"><i class="far fa-star text-warning pr-1"></i><span>Genre</span></div>

                        <div class="content-genre-sidebar">
                            <ul class="genre-sidebar overflow-auto mCustomScrollbar text-capitalize" data-mcs-theme="minimal-dark">
                            @foreach (\DB::table('genres')->orderBy('genre')->get() as $genre)
                                <li><a class="text-truncate" title="{{ str_replace("-", " ", $genre->genre) }}" href="{{ url('/archive/genre') . '/' . strtolower($genre->genre) }}">{{ str_replace("-", " ", $genre->genre) }}</a></li>
                            @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="fb-sidebar pt-1">
                        <div class="fb-page" data-href="https://www.facebook.com/microanime/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
                    </div>

                    <div class="box-chat-sidebar pt-1">
                            <div class="title-widget hidden-chat"><i class="fas fa-comment-dots text-primary pr-1"></i><span>Chat Room</span></div>

                            <div class="content-chat-sidebar pt-1">
                                <script id="cid0020000226698917551" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 100%;height: 340px;">{"handle":"microanime","arch":"js","styles":{"a":"C8C8C8","b":100,"c":"000000","d":"000000","k":"C8C8C8","l":"C8C8C8","m":"C8C8C8","p":"10","q":"C8C8C8","r":100,"usricon":1.11,"cnrs":"0.36","fwtickm":1}}</script>
                            </div>
                    </div>

                    <div class="ads-sidebar pt-1">
                        <a href="" target="_blank">
                            <img class="w-100" src="https://3.bp.blogspot.com/-lZARqFxwBNA/XSgFltAQoMI/AAAAAAAD5rE/0MTeGBJPUbAcQqDvsTGvHCXcO4lgpE9HwCLcBGAs/s1600/ligahokie.gif" alt="">
                        </a>
                    </div>

                    <div class="box-hot-sidebar pt-1">
                        <div class="title-widget"><i class="fab fa-hotjar text-danger pr-1"></i><span>Weekly HOT</span></div>
                        <div class="content-hot-sidebar">
                            <div class="box-content-sidebar pb-2">

                                @foreach (\DB::table('detail_animes')->join('amount_hot_animes', 'detail_animes.id_anime', '=', 'amount_hot_animes.id_anime')->orderBy('amount_hot_animes.amount_views', 'DESC')->limit(5)->get() as $hot_sidebar)
                                    <div class="hot-sidebar">
                                        <div class="col-md-3 img-hot-sidebar p-0 pt-1 pb-1 pr-1 float-left">
                                            <a href="{{ url('/anime') . '/' . $hot_sidebar->id_anime }}" title="{{ $hot_sidebar->title_anime }}"><img style="min-height: 84px; height:100%;" data-src="{{ $hot_sidebar->image_anime }}" class="d-block w-100" alt="{{ $hot_sidebar->title_anime }}"></a>
                                            {!! App\Helpers\AnimeLabelHelper::instance()->label_new($hot_sidebar->id_anime, 1) !!}
                                        </div>

                                        <div style="height:20px;" class="title-slider title-sidebar text-uppercase"><a href="{{ $hot_sidebar->id_anime }}" title="{{ $hot_sidebar->title_anime }}">{{ $hot_sidebar->title_anime }}</a></div>
                                        <div class="status-hot-sidebar text-capitalize"><span class="font-weight-bold text-monospace">Status : </span><span>{{ $hot_sidebar->status_anime }}</span></div>
                                        <div class="genre-hot-sidebar text-capitalize text-secondary">
                                            <span class="font-weight-bold text-monospace text-white">Genres : </span>
                                            @foreach (explode(",", $hot_sidebar->genre_anime) as $hot_genre)
                                            <a class="text-secondary" title="{{ $hot_genre }}" href="{{ url('/archive/genre') . '/' . strtolower(str_replace(",", "", $hot_genre)) }}">{{ $hot_genre }}</a>,
                                            @endforeach
                                        </div>
                                        <div class="summary-hot-sidebar text-capitalize text-justify">
                                            <span class="font-weight-bold text-monospace text-white">Summary : </span>
                                            <span>{{ $hot_sidebar->summary_anime }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="rank-hot-sidebar mb-1 mt-1"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div>
        </main>
        <!-- Main -->

        <!-- Footer -->
        <footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            <div class="container">
                <div class="page-footer font-small bg-dark text-white">
                    <div style="margin-bottom: 5px;"><a class="scrollToTop rounded" href="#" style="display: none;"><i class="fas fa-angle-up"></i></a></div>

                    <!-- Footer Elements -->
                    <div class="container">
                        <!-- Social buttons -->
                        <ul class="list-unstyled list-inline text-center" style="margin-bottom: 7px;">
                            <li class="list-inline-item">
                                <a href="a" class="btn-floating btn-fb mx-1 text-white">
                                <i class="fab fa-facebook-f"> </i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="a" class="btn-floating btn-tw mx-1 text-white">
                                <i class="fab fa-twitter"> </i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="a" class="btn-floating btn-instagram mx-1 text-white">
                                <i class="fab fa-instagram"> </i>
                                </a>
                            </li>
                        </ul>
                        <!-- Social buttons -->
                    </div>
                    <!-- Footer Elements -->

                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-2">© 2019 - <?= date("Y");?> Copyright:
                        <a href="{{ url('/') }}">Micro Anime</a>
                    </div>
                    <!-- Copyright -->
                </div>
            </div>
        </footer>
        <!-- Footer -->

        <!-- Ads Banner -->
        <div class="container">
            @foreach (\DB::table('ads_banners')->where('type_for', 'footer')->orderBy('id', 'desc')->limit(1)->get() as $ads_footer)
            <div id="floatbanner" class="fixed-bottom" style="text-align: center;">
                <div>
                    <a id="close-floatbanner" onclick="document.getElementById('floatbanner').style.display = 'none';" style="cursor:pointer; position: absolute;z-index: 10;"><img style="width: 30px;" alt="close" src="{{ asset('img/btn-close.png') }}" title="close button"></a>

                    <a class="" target="_blank" href="{{ $ads_footer->url }}" title="{{ $ads_footer->title }}">
                        <img style="max-height:90px; max-width:728px;" class="w-100" src="{{ $ads_footer->image }}" alt="{{ $ads_footer->title }}" title="{{ $ads_footer->title }}">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Ads Banner -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal-->

        <!-- Flash Data-->
        <div class="flash-data" data-flash="{{ session('flash_data') ?? '' }}"></div>
        <!-- Flash Data-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/app.js')}}"></script>
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151897549-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151897549-1');
        </script>

        <script src="{{ asset('js/script.js')}}"></script>
    </body>
</html>
