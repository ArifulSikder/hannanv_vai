<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $general ? $general->sitename : 'Buy and sell used stuff in Turkey' }} ||
        {{ $general ? $general->site_sub_title : '' }}</title>
    <link rel="preconnect" href="//fonts.googleapis.com">
    <link rel="preconnect" href="//fonts.gstatic.com" crossorigin>
    <link
        href="//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/frontend') }}/images/logo/favicon.ico" type="image/x-icon">
    <!-- swipper css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/swiper.min.css">
    <!-- odometer css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/odometer.css">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/line-awesome.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/animate.css">
    <!-- nice-select css link -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/nice-select.css"> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
    <!-- lightcase css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/lightcase.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ URL::asset('core/public') }}/css/app.css">
    <style>
        a {
            text-decoration: none;
        }
    </style>

    <script type='text/javascript'
        src='//platform-api.sharethis.com/js/sharethis.js#property=633927585a306f001995daca&product=sticky-share-buttons'
        async='async'></script>

    @stack('custom_css')
</head>

<body>
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <header class="header-section">
        <div class="header">
            <div class="header-bottom-area">
                <div class="container">
                    <div class="header-menu-content">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img width="65" height="42"
                                    src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                    alt="Logo" class="Headerstyle__LogoStyled-x7dkhw-2 jTcymi">
                            </a>
                        </div>
                        <div class="header-search-area">
                            <form id="search-form" class="header-search-form" action="{{ url('ads/search') }}"
                                method="get">
                                <label class="search-icon"><i class="fas fa-search"></i></label>
                                <input type="text" name="search" id="search_text" class="form--control"
                                    placeholder="@lang('Search letgo')" />
                            </form>


                        </div>
                        <div class="header-action">

                            <a href="{{ route('frontend.user.post.ad') }}" class="btn--base"><i
                                    class="fas fa-camera"></i>
                                Sell</a>
                            @if (!Auth::guard('advertiser')->check())
                                <a href="#" class="btn--base active" data-bs-toggle="modal"
                                    data-bs-target="#accountModal">Log In</a>
                                <a href="{{ url('register') }}" class="btn--base active">Sign Up</a>
                            @endif

                        </div>
                        @if (isset(Auth::guard('advertiser')->user()->id))
                            @php
                                $user = Auth::guard('advertiser')->user();
                            @endphp
                            <div class="header-after-login-btn">
                                <a href="{{ route('frontend.user.chat') }}">
                                    <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                        fill="#757575" fill-rule="evenodd">
                                        <path class="rui-2Xn3A"
                                            d="M370.341 929.721C347.913 952.149 309.533 936.446 309.283 904.719V823.559C309.283 798.807 289.217 778.741 264.5 778.741C165.564 778.741 85.334 698.547 85.334 599.61V349.586C85.334 250.792 165.456 170.67 264.25 170.67H764.871C863.701 170.67 943.787 250.792 943.787 349.586V599.861C943.787 698.654 863.701 778.741 764.871 778.741H551.009C532.052 778.741 513.845 786.288 500.432 799.702L370.341 929.721ZM281.924 474.453C281.924 504.142 305.996 528.035 335.613 528.035C365.23 528.035 389.23 504.142 389.23 474.453C389.23 444.765 365.23 420.872 335.613 420.872C305.996 420.872 281.924 444.765 281.924 474.453ZM693.302 528.035C663.685 528.035 639.613 504.142 639.613 474.453C639.613 444.765 663.685 420.872 693.302 420.872C722.918 420.872 746.919 444.765 746.919 474.453C746.919 504.142 722.918 528.035 693.302 528.035ZM460.768 474.453C460.768 504.142 484.84 528.035 514.457 528.035C544.073 528.035 568.074 504.142 568.074 474.453C568.074 444.765 544.073 420.872 514.457 420.872C484.84 420.872 460.768 444.765 460.768 474.453Z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                        fill="#757575" fill-rule="evenodd">
                                        <path class="rui-2Xn3A"
                                            d="M612.13 213.181C709.297 254.087 778.018 352.424 778.018 467.543V606.995C778.018 633.835 788.564 658.152 805.588 675.711C815.821 686.221 809.688 704.006 795.261 704.006H228.749C214.323 704.006 208.189 686.221 218.391 675.711C235.477 658.152 246.023 633.835 246.023 606.995V467.543C246.023 352.424 314.619 254.087 411.818 213.181C416.481 211.241 419.673 207.069 420.862 202.025C430.845 159.534 467.865 128.006 512.021 128.006C556.176 128.006 593.072 159.534 603.086 202.025C604.275 207.069 607.467 211.241 612.13 213.181Z M641.423 803.922C644.093 792.018 633.795 780.805 620.405 780.805H413.317C399.927 780.805 389.63 792.018 392.299 803.922C404.122 856.491 455.311 896.005 516.882 896.005C578.326 896.005 629.6 856.491 641.423 803.922Z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="menu-toggler">
                                <div class="profile-toggler-btn">
                                    <img src="{{ URL::asset('core/public/storage/user/' . $user->image) }}"
                                        alt="profile">
                                </div>
                            </div>
                            <div class="menu-toggler">
                                <i class="fas fa-bars"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Responsive Sell Btn
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="res-sell-btn">
        <a href="sell.html" class="btn--base"><i class="fas fa-camera"></i> Sell Your Stuff</a>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Responsive Sell Btn
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Menu
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <div class="menu-overlay"></div>
    <div class="menu-container">
        @if (Auth::guard('advertiser')->check())
            <div class="menu-account-wrapper">
                <div class="thumb">
                    <svg width="72" height="72" viewBox="0 0 76 76" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <circle id="AvatarMainBG" cx="38" cy="38" r="38"></circle>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <circle fill="#F7F3F3" cx="38" cy="38" r="38"></circle>
                            <mask id="AvatarBody" fill="#fff">
                                <use xlink:href="#AvatarMainBG"></use>
                            </mask>
                            <use fill="#DDD" xlink:href="#AvatarMainBG"></use>
                            <g mask="url(#AvatarBody)" fill="#BBB">
                                <g transform="translate(12.35 23.75)">
                                    <circle cx="26.125" cy="11.875" r="11.875"></circle>
                                    <ellipse cx="26.125" cy="52.725" rx="26.125" ry="24.225"></ellipse>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="content">
                    <span class="hello-text">Hello .</span>
                    <h5 class="title">
                        <a href="#"data-bs-toggle="modal"
                            data-bs-target="#accountModal">{{ Auth::guard('advertiser') ? Auth::guard('advertiser')->user()->first_name : '' }}</a>
                    </h5>
                    <span class="sub-title"><a href="#">You are logged in now</a></span>
                </div>
            </div>
        @endif
        @if (isset(Auth::guard('advertiser')->user()->id))
            <div class="menu-wrapper">
                <nav class="menu-nav">
                    <ul class="header-menu">
                        <li class="active"><a href="{{ url('/') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz">
                                    <path
                                        d="M2 10.442V20a2 2 0 0 0 2 2h3.56a2 2 0 0 0 1.962-2.392L9 17a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v3a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-8.664a3 3 0 0 0-.993-2.23l-7.114-6.403a3 3 0 0 0-3.881-.112L3.126 8.099A3 3 0 0 0 2 10.442z">
                                    </path>
                                </svg>
                                Discover</a>
                        </li>
                        <li><a href="{{ route('frontend.user.my_ads') }}">
                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                    class="" fill-rule="evenodd">
                                    <path class="rui-2Xn3A"
                                        d="M712.252 170.666C640.945 170.666 575.243 201.641 531.987 255.662L512.011 280.593L492.036 255.662C448.768 201.641 383.067 170.666 311.77 170.666C186.917 170.666 85.334 267.226 85.334 385.907C85.334 628.106 392.029 895.999 512.52 895.999C633.011 895.999 938.667 646.348 938.667 385.907C938.667 267.216 837.106 170.666 712.252 170.666Z">
                                    </path>
                                </svg>
                                My Ads</a>
                        </li>
                        <li><a href="help.html">
                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                    class="" fill-rule="evenodd">
                                    <path class="rui-2Xn3A"
                                        d="M512.001 938.664C747.642 938.664 938.667 747.639 938.667 511.997C938.667 276.356 747.642 85.3306 512.001 85.3306C276.359 85.3306 85.334 276.356 85.334 511.997C85.334 747.639 276.359 938.664 512.001 938.664ZM499.2 661.331C466.227 661.331 439.467 688.082 439.467 721.043C439.467 754.004 466.227 780.755 499.2 780.755C532.173 780.755 558.933 754.004 558.933 721.043C558.933 688.082 532.173 661.331 499.2 661.331ZM568.033 409.251C568.033 371.481 537.442 341.331 498.918 341.331C461.454 341.331 429.803 373.881 429.803 412.715C429.803 436.279 410.7 455.382 387.136 455.382C363.572 455.382 344.469 436.279 344.469 412.715C344.469 327.279 413.782 255.997 498.918 255.997C584.296 255.997 653.366 324.073 653.366 409.251C653.366 479.296 606.695 537.747 542.647 556.329C542.647 566.36 541.584 566.36 541.584 566.36C541.584 589.924 522.482 609.027 498.918 609.027C475.354 609.027 456.251 589.924 456.251 566.36V519.838C456.251 496.274 475.354 477.171 498.918 477.171C537.457 477.171 568.033 447.043 568.033 409.251Z">
                                    </path>
                                </svg>
                                Help</a>
                        </li>
                        <li><a href="{{ route('frontend.user.setting', Auth::guard('advertiser')->user()->id) }}">
                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                    class="" fill-rule="evenodd">
                                    <path class="rui-2Xn3A"
                                        d="M936.855 385.331C933.068 399.464 923.628 411.464 910.721 418.451C836.375 458.664 836.375 565.331 910.721 605.544C923.628 612.531 933.068 624.531 936.855 638.664C940.641 652.851 938.455 667.944 930.775 680.424L873.868 772.851C859.041 796.904 828.001 805.224 803.095 791.784L779.255 778.824C708.375 740.477 622.188 791.837 622.188 872.424V885.331C622.188 914.771 598.348 938.664 568.855 938.664H455.148C425.655 938.664 401.815 914.771 401.815 885.331V872.424C401.815 791.837 315.628 740.477 244.748 778.824L220.908 791.784C196.001 805.224 164.961 796.904 150.135 772.851L93.228 680.424C85.548 667.944 83.3613 652.851 87.148 638.664C90.9346 624.531 100.375 612.531 113.281 605.544C187.628 565.331 187.628 458.664 113.281 418.451C100.375 411.464 90.9346 399.464 87.148 385.331C83.3613 371.144 85.548 356.051 93.228 343.571L150.135 251.144C164.961 227.091 196.001 218.771 220.908 232.211L244.748 245.171C315.628 283.517 401.815 232.157 401.815 151.571V138.664C401.815 109.224 425.655 85.3306 455.148 85.3306H568.855C598.348 85.3306 622.188 109.224 622.188 138.664V151.571C622.188 232.157 708.375 283.517 779.255 245.171L803.095 232.211C828.001 218.771 859.041 227.091 873.868 251.144L930.775 343.571C938.455 356.051 940.641 371.144 936.855 385.331ZM352.001 511.997C352.001 600.371 423.628 671.997 512.001 671.997C600.375 671.997 672.001 600.371 672.001 511.997C672.001 423.624 600.375 351.997 512.001 351.997C423.628 351.997 352.001 423.624 352.001 511.997Z">
                                    </path>
                                </svg>
                                Settings</a>
                        </li>
                        <li><a href="#">
                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                    class="" fill-rule="evenodd">
                                    <path class="rui-2Xn3A"
                                        d="M512.001 938.665C747.642 938.665 938.667 747.64 938.667 511.999C938.667 276.357 747.642 85.332 512.001 85.332C276.359 85.332 85.334 276.357 85.334 511.999C85.334 747.64 276.359 938.665 512.001 938.665ZM682.667 565.332C712.122 565.332 736.001 541.454 736.001 511.999C736.001 482.544 712.122 458.665 682.667 458.665H565.334V341.332C565.334 311.877 541.456 287.999 512.001 287.999C482.545 287.999 458.667 311.877 458.667 341.332V458.665H341.334C311.879 458.665 288.001 482.544 288.001 511.999C288.001 541.454 311.879 565.332 341.334 565.332H458.667V682.665C458.667 712.121 482.545 735.999 512.001 735.999C541.456 735.999 565.334 712.121 565.334 682.665V565.332H682.667Z">
                                    </path>
                                </svg>
                                install letgo app</a>
                        </li>
                        <li>
                            <a href="{{ url('user/logout') }}">

                                <svg width="24px" height="24px" viewBox="0 0 1024 1024" data-aut-id="icon"
                                    class="" fill-rule="evenodd">
                                    <path class="rui-2Xn3A"
                                        d="M712.533 337.067C733.866 315.734 772.266 315.734 793.599 337.067L942.933 486.4C947.199 490.667 951.466 499.2 955.733 503.467C959.999 507.734 959.999 516.267 959.999 524.8C959.999 533.334 959.999 541.867 955.733 546.134C951.466 554.667 947.199 558.934 942.933 563.2L793.599 712.534C772.266 733.867 733.866 733.867 712.533 712.534C691.199 691.2 691.199 652.8 712.533 631.467L759.466 580.267H422.399C392.533 580.267 362.666 554.667 362.666 524.8C362.666 494.934 388.266 465.067 422.399 465.067H759.466L712.533 418.134C691.199 392.534 691.199 358.4 712.533 337.067Z M593.066 819.2C593.066 785.067 567.466 759.467 533.333 759.467H238.933C234.666 759.467 230.399 759.467 226.133 755.2C221.866 750.934 221.866 746.667 221.866 742.4V302.934C221.866 298.667 221.866 294.4 226.133 290.134C230.399 285.867 234.666 285.867 238.933 285.867H533.333C567.466 285.867 593.066 260.267 593.066 226.134C593.066 192 567.466 170.667 533.333 170.667H238.933C204.799 170.667 170.666 183.467 145.066 209.067C119.466 234.667 106.666 268.8 106.666 302.934V746.667C106.666 780.8 119.466 814.934 145.066 840.534C170.666 866.134 204.799 878.934 238.933 878.934H533.333C567.466 874.667 593.066 849.067 593.066 819.2Z">
                                    </path>
                                </svg>
                                @lang('Exit')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
    </div>
    <!--~~~~~~~~End Menu~~~~~~~~~~~-->
    @if (isset($page_file_name) && $page_file_name == 'page_file_name')
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Start Banner~~~~~~~~~~-->
        <div class="banner-section">
            <div class="container">
                <div class="banner-area">
                    <div class="banner-wrapper">
                        <div class="left">
                            <div class="content">
                                <span>Buy your car from us</span>
                                <a href="#" class="btn--base active">See our cars</a>
                            </div>
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/frontend') }}/images/banner/banner-1.webp"
                                    alt="banner">
                            </div>
                        </div>
                        <div class="right">
                            <div class="content">
                                <span>Sell your car to us, get paid instantly</span>
                                <a href="#" class="btn--base active">Get an initial quote</a>
                            </div>
                            <div class="thumb">
                                <img src="{{ URL::asset('assets/frontend') }}/images/banner/banner-2.webp"
                                    alt="banner">
                            </div>
                        </div>
                    </div>
                    <div class="banner-logo-area">
                        <div class="banner-logo">
                            <img src="{{ getImage(imagePath()['logoIcon']['path'] . '/whiteLogo.png', '?' . time()) }}"
                                alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
End Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    @endif
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Scroll-To-Top
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <a href="#" class="scrollToTop">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" class="sc-AxjAm iTMiVy">
            <path
                d="M12.01 10.666l-5.414 5.793c-.57.61-1.494.61-2.064 0a1.64 1.64 0 0 1 0-2.21l6.446-6.896a1.408 1.408 0 0 1 1.032-.457c.393.001.768.167 1.033.457l6.446 6.897a1.64 1.64 0 0 1 0 2.208c-.57.61-1.495.61-2.065 0l-5.414-5.792z">
            </path>
        </svg>
    </a>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Scroll-To-Top
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    @yield('content')
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <footer class="footer-section bg--base pt-40">
        <div class="container">
            <div class="footer-wrapper">
                <div class="left">
                    <div class="row align-items-center mb-20-none">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="footer-widget">
                                <div class="footer-logo">
                                    <img src="{{ getImage(imagePath()['logoIcon']['path'] . '/whiteLogo.png', '?' . time()) }}"
                                        alt="Logo">

                                </div>
                                <ul class="footer-list">
                                    @foreach (\DB::table('cms_pages')->where('position', 1)->get() as $page)
                                        <li>
                                            <a
                                                href="{{ $general->domain_name }}/{{ $page->slug }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="footer-widget">
                                <div class="footer-logo letgo">
                                    <img width="65" height="42"
                                        src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                        alt="Logo" class="Headerstyle__LogoStyled-x7dkhw-2 jTcymi">
                                </div>
                                <ul class="footer-list">
                                    @foreach (\DB::table('cms_pages')->where('position', 2)->get() as $page)
                                        <li>
                                            <a
                                                href="{{ $general->domain_name }}/{{ $page->slug }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ url('help') }}">@lang('Help & Support')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.contact') }}">@lang('Contact Us')</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if (isset($general->apps_settings))
                            @php $app_settings = json_decode($general->apps_settings, true); @endphp
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="footer-widget">
                                    <h4 class="title">@lang('Download the app')</h4>
                                    <ul class="footer-app-list">
                                        @if ($app_settings['google_play_status'] == 1)
                                            <li>
                                                <a href="{{ $app_settings['play_store_app_link'] }}" target="_blank">
                                                    <img src="{{ URL::asset('assets/frontend') }}/images/footer/footer_app_store.svg"
                                                        alt="footer">
                                                </a>
                                            </li>
                                        @endif
                                        @if ($app_settings['ios_status'] == 1)
                                            <li><a href="{{ $app_settings['ios_app_link'] }}" target="_blank"><img
                                                        src="{{ URL::asset('assets/frontend') }}/images/footer/footer_google_play.svg"
                                                        alt="footer"></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="right">
                    <select class="footer-language-select">
                        <option value="s" selected>Türkiye (English)</option>
                        <option value="1">Türkiye (Türkçe)</option>
                        <option value="2">Norge (Norsk)</option>
                        <option value="3">España (Español)</option>
                    </select>
                    <div class="social-area text-end">
                        <ul class="footer-social pb-10">
                            @forelse (\DB::table('social_media')->where('status', '=', 1)->get() as $item)
                                <li><a href="{{ $item->social_link }}" target="_blank">{!! $item->icon !!}</a>
                                </li>
                            @empty
                                @lang('No social media found')
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrapper">
            <div class="container">
                <div class="copyright-area">
                    <p>© letgo 2022</p>
                    <ul class="copyright-list">
                        @foreach (\DB::table('cms_pages')->where('position', 1)->get() as $page)
                            <li>
                                <a href="{{ $general->domain_name }}{{ $page->slug }}">{{ $page->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--~~~~~~~~~~~~End Footer~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~ Start Modal~~~~~~~~~~~~~~~~~~~~~-->
    <div class="modal account-modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title">Help</h5>
                </div>
                <div class="modal-body">
                    <div class="modal-body-wrapper">
                        <div class="modal-logo">
                            <a href="{{ url('/') }}">
                                <svg width="65" height="42" class="Headerstyle__LogoStyled-x7dkhw-2 jTcymi"
                                    viewBox="0 0 65 42" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#ff3f55"
                                        d="M59.1144814,9.05591125 C53.3810079,9.05591125 49.3941303,16.2399595 49.3941303,21.9793868 C49.3941303,22.6924094 49.4615268,23.3887614 49.599416,24.0465332 C49.6329952,24.2068085 49.5734576,24.3713705 49.4393789,24.4654399 C48.8332858,24.889586 48.1786101,25.3053968 47.4924985,25.7093 C47.2019548,25.8802921 46.8397279,25.6423798 46.8840239,25.3077783 C46.9059337,25.137977 46.9314158,24.9600785 46.9704725,24.7545546 L49.754452,9.96874215 C49.786126,9.80036975 49.7111086,9.62675802 49.5620264,9.54269089 C49.1902734,9.3328803 48.7254036,9.20785128 48.2376714,9.20785128 C47.5222673,9.20785128 46.7563752,9.45981452 46.19434,10.0116092 C46.0412092,10.1618822 45.8052021,10.1785528 45.6406401,10.0411399 C44.8535527,9.38432081 43.8642754,9.05591125 42.5332523,9.05591125 C37.8959856,9.05591125 33.6800071,15.7800909 33.6669088,22.0246354 C33.6661944,22.4764069 33.7042984,22.9910501 33.78908,23.5295084 C33.812895,23.6809722 33.7552627,23.8355318 33.6302336,23.9241238 C32.7114489,24.5783232 31.5507034,25.096777 30.5133198,25.096777 C29.526424,25.096777 28.918664,24.4123324 29.3744841,22.2835049 L31.4790201,12.2290287 C31.5185531,12.0411278 31.6838295,11.906811 31.8755407,11.906811 L34.7924081,11.906811 C35.8419374,11.906811 36.4387426,11.120438 36.4206432,10.087103 C36.4168328,9.87110044 36.2317898,9.70201358 36.0157873,9.70201358 L32.5406951,9.70201358 C32.2830162,9.70201358 32.0908288,9.46457752 32.1446508,9.21213799 L33.1098748,4.66989333 C33.148217,4.49080414 33.0636736,4.3052849 32.899826,4.22383742 C32.4754418,4.01235977 31.9438899,3.88637815 31.3868558,3.88637815 C30.0198719,3.88637815 28.5766798,4.53224234 28.1970679,6.28098152 L27.5159574,9.38360635 C27.4752337,9.5696019 27.3106717,9.70201358 27.1203894,9.70201358 L26.7136284,9.70201358 C25.6636228,9.70201358 25.0668176,10.4881484 25.0846789,11.5212453 C25.0884894,11.7372478 25.2740086,11.906811 25.4897729,11.906811 L26.4909576,11.906811 C26.7481602,11.906811 26.9401095,12.1437708 26.8867638,12.3962103 L24.9255943,21.674316 C24.9115435,21.7424271 24.8808221,21.8057751 24.8353353,21.8584063 C23.1473245,23.8202902 20.4174053,25.4004188 18.002321,25.4004188 C16.423383,25.4004188 15.2871669,24.7133546 14.937562,22.8822154 C14.9046973,22.7100325 14.9830487,22.5345156 15.1345125,22.4473526 C22.05469,18.4611893 23.5781388,15.9713257 23.7057874,12.7050915 C23.7724696,10.9946946 23.018247,9.05591125 19.7322463,9.05591125 C13.7753876,9.05591125 10.5236805,16.96227 10.3305405,21.903893 C10.3069635,22.5104624 10.3319693,23.0734502 10.3993659,23.5945235 C10.4203232,23.7555133 10.3493543,23.9148359 10.2097982,23.9974742 C9.13502487,24.6309545 7.92164803,25.0208069 6.92403555,25.0208069 C5.59491756,25.0208069 4.55348538,24.2601542 4.81973766,22.2835049 C4.85522208,21.8555485 4.92428573,21.3932983 4.99573088,20.9610552 C5.0047806,20.9050898 5.02549969,20.8529348 5.05645926,20.8055429 C9.93259093,13.3438112 13.8304003,6.27764742 13.8304003,3.32196145 C13.8304003,1.34531222 12.442221,0 10.6577592,0 C5.6837477,0 1.81999385,9.32144907 0.0731598607,23.0822618 C-0.420526144,27.0729499 1.64614397,28.7078531 4.30390365,28.7078531 C6.40105703,28.7078531 8.88020383,27.7793042 10.8151767,26.2889583 C10.9976,26.1484496 11.2612326,26.1970323 11.3898339,26.3885053 C12.4476984,27.9626802 14.1966758,28.7078531 16.2028556,28.7078531 C18.7620211,28.7078531 21.431212,27.5456786 23.7138846,25.422805 C23.96299,25.1910845 24.37118,25.3439771 24.394995,25.6835797 C24.5490785,27.8843286 25.8419975,28.7078531 27.589546,28.7078531 C29.7333769,28.7078531 32.1177397,27.4651837 33.8829113,25.8686227 C34.0867681,25.6845324 34.4049372,25.753596 34.5216309,26.0027015 C35.2220316,27.4997155 36.4049252,28.7078531 38.2546402,28.7078531 C39.591379,28.7078531 40.8752484,27.9124304 42.0093211,26.6473749 C42.2886716,26.3356359 42.7983138,26.5949818 42.7066258,27.0036481 C42.6399437,27.2996691 42.5732616,27.5933088 42.5011019,27.8919495 C42.4739527,28.0043565 42.401555,28.0996167 42.2996266,28.1539151 C39.4006205,29.7009407 33.9157761,32.3301223 33.9157761,36.6889911 C33.9157761,39.0257239 35.8500345,41.0940611 38.3275142,41.0940611 C43.8587979,41.0940611 44.7882995,35.465612 46.2807886,28.479943 C46.3057944,28.36444 46.38105,28.264655 46.4851218,28.2084515 C47.7277912,27.5380578 48.9083032,26.7574005 49.8251826,26.0867686 C50.0180846,25.9457835 50.2874328,26.003416 50.4084133,26.2091779 C51.292428,27.7130985 52.7806305,28.7078531 54.9756638,28.7078531 C60.9370473,28.7078531 64.9998949,21.5233285 64.9998949,15.8601095 C64.9998949,12.1347211 63.2532991,9.05591125 59.1144814,9.05591125 Z M10.9504462,2.50843931 C11.367924,2.50843931 11.7039544,2.94163509 11.7039544,3.58797557 C11.7039544,4.71609453 9.52392466,9.7525015 6.74637527,15.1366082 C6.52989646,15.5559913 5.89212939,15.3299864 5.98858036,14.8677363 C7.41915046,8.01185942 9.83685443,2.50843931 10.9504462,2.50843931 Z M19.8496544,12.0204087 C20.5755372,12.0204087 20.8870381,12.7736789 20.8586981,13.5028957 C20.7662957,15.8724932 18.7493991,18.2766227 15.5696135,20.4699888 C15.2812132,20.6690827 14.8918372,20.432123 14.9370857,20.0846613 C15.3195554,17.1330239 16.622715,12.0204087 19.8496544,12.0204087 Z M37.9088456,37.7111331 C37.1255687,37.7111331 36.1453412,37.1202817 36.1479608,35.924528 C36.1520093,33.9376383 38.1929592,32.5042104 41.1133989,30.9488494 C41.4251379,30.7828585 41.7868886,31.070068 41.6961532,31.411814 C40.5923256,35.5837346 39.7359364,37.7111331 37.9088456,37.7111331 Z M43.4210773,22.3147027 C43.411075,22.3697154 43.3901178,22.4223468 43.3593963,22.4692623 C42.4546626,23.8376752 41.080296,24.7926588 40.0310049,24.7926588 C38.9967172,24.7926588 37.8000109,23.7128844 37.8040594,21.8124433 C37.8116803,18.2666204 39.6916404,11.906811 43.7282915,11.906811 C44.1255265,11.906811 44.5225235,11.9546793 44.9523851,12.0885198 C45.1488593,12.1494864 45.2698397,12.349771 45.232212,12.5519607 L43.4210773,22.3147027 Z M56.7222595,25.4004188 C55.3933797,25.4004188 54.2543059,24.1084523 54.2543059,20.7631521 C54.2543059,17.0384782 56.4943495,11.944677 59.9499134,11.944677 C61.5067033,11.944677 62.1520912,13.5028957 62.1520912,15.5557531 C62.1520912,19.5466794 59.7220034,25.4004188 56.7222595,25.4004188 Z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="modal-wrapper-content">
                            <p>Buy and sell quickly, safely and locally. It’s time to letgo!</p>
                        </div>
                        <div class="modal-account-wrapper">
                            <h6 class="title">QUICKLY CONNECT WITH</h6>
                            <div class="modal-account-btn">
                                <a href="{{ url('login/facebook') }}" class="btn--base w-100 facebook">
                                    <svg viewBox="0 0 24 24" width="24" height="24"
                                        class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                        <path
                                            d="M13.213 5.22c-.89.446-.606 3.316-.606 3.316h3.231v2.907h-3.23v10.359H8.773V11.444H6.39V8.536h2.423c-.221 0 .12-2.845.146-3.114.136-1.428 1.19-2.685 2.544-3.153 1.854-.638 3.55-.286 5.385.17l-.484 2.504s-2.585-.455-3.191.277z">
                                        </path>
                                    </svg>
                                    Continue with Facebook
                                </a>
                                <a href="{{ url('login/google') }}" class="btn--base w-100 google">
                                    <svg viewBox="0 0 24 24" width="24" height="24"
                                        class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                        <path
                                            d="M15.303 8.287l2.26-2.206C16.174 4.791 14.368 4 12.206 4a8 8 0 0 0-7.151 4.412l2.588 2.01c.65-1.93 2.446-3.326 4.563-3.326 1.504 0 2.518.649 3.096 1.191zm4.59 3.897c0-.659-.054-1.139-.17-1.637h-7.516v2.97h4.412c-.089.74-.569 1.851-1.636 2.598l2.526 1.957c1.512-1.396 2.384-3.451 2.384-5.888zm-12.24 1.405a4.928 4.928 0 0 1-.267-1.583c0-.552.098-1.086.258-1.584l-2.588-2.01a8.013 8.013 0 0 0-.854 3.594c0 1.29.311 2.508.854 3.593l2.597-2.01zm4.554 6.422c2.162 0 3.976-.711 5.302-1.939l-2.526-1.957c-.676.472-1.584.8-2.776.8-2.117 0-3.914-1.396-4.554-3.326l-2.588 2.01c1.316 2.615 4.011 4.412 7.142 4.412z">
                                        </path>
                                    </svg>
                                    Continue with Google
                                </a>
                                <a href="#" class="btn--base w-100 apple">
                                    <svg viewBox="0 0 24 24" width="24" height="24"
                                        class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                        <path
                                            d="M19.6437 17.5861C19.3385 18.2848 18.9772 18.928 18.5586 19.5193C17.9881 20.3255 17.5209 20.8835 17.1609 21.1934C16.6027 21.702 16.0048 21.9625 15.3644 21.9773C14.9047 21.9773 14.3504 21.8477 13.705 21.5847C13.0576 21.323 12.4626 21.1934 11.9186 21.1934C11.348 21.1934 10.7361 21.323 10.0815 21.5847C9.42601 21.8477 8.89793 21.9847 8.49417 21.9983C7.88012 22.0242 7.26806 21.7563 6.65713 21.1934C6.2672 20.8563 5.77947 20.2786 5.1952 19.4601C4.56832 18.586 4.05294 17.5725 3.64918 16.417C3.21677 15.1689 3 13.9603 3 12.7902C3 11.4498 3.29226 10.2938 3.87766 9.32509C4.33773 8.54696 4.94978 7.93315 5.71581 7.48255C6.48185 7.03195 7.30955 6.80232 8.20091 6.78763C8.68863 6.78763 9.32822 6.93713 10.123 7.23095C10.9156 7.52576 11.4245 7.67526 11.6476 7.67526C11.8144 7.67526 12.3798 7.50045 13.3382 7.15194C14.2445 6.82874 15.0094 6.69492 15.636 6.74763C17.334 6.88343 18.6097 7.54675 19.4581 8.74177C17.9395 9.6536 17.1883 10.9307 17.2032 12.5691C17.2169 13.8452 17.6841 14.9071 18.6022 15.7503C19.0183 16.1417 19.483 16.4441 20 16.6589C19.8879 16.9811 19.7695 17.2898 19.6437 17.5861ZM15.7494 2.40011C15.7494 3.40034 15.3806 4.33425 14.6456 5.19867C13.7586 6.22629 12.6857 6.8201 11.5223 6.7264C11.5075 6.6064 11.4989 6.48011 11.4989 6.3474C11.4989 5.38718 11.9207 4.35956 12.6698 3.51934C13.0438 3.09392 13.5194 2.74019 14.0962 2.45801C14.6718 2.18004 15.2162 2.02632 15.7282 2C15.7431 2.13371 15.7494 2.26744 15.7494 2.4001V2.40011Z">
                                        </path>
                                    </svg>
                                    Continue with Apple
                                </a>
                            </div>
                        </div>
                        <div class="modal-account-wrapper mt-20">
                            <h6 class="title">OR USE YOUR EMAIL</h6>
                            <div class="modal-account-btn">
                                <a href="{{ route('frontend.login') }}" class="btn--base w-100 email">
                                    <svg viewBox="0 0 24 24" width="24" height="24"
                                        class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                        <path
                                            d="M12,24 C5.37258301,24 0,18.627417 0,12 C0,5.37258301 5.37258301,0 12,0 C18.627417,0 24,5.37258301  24,12 C24,18.627417 18.627417,24 12,24 Z M6,10.3 L6,15.725 C6,16.1528 6.3472,16.5 6.775,16.5 L17.625,16.5  C18.0528,16.5 18.4,16.1528 18.4,15.725 L18.4,10.3 L12.9885562,13.0057219 C12.4921486,13.2539258 11.9078514,13.2539258  11.4114438,13.0057219 L6,10.3 Z M17.625,7.20000001 L6.775,7.20000001 C6.3472,7.20000001 6,7.57034667 6,8.02666667  L6,8.85333334 L11.3702281,11.717455 C11.8888356,11.9940456 12.5111644,11.9940456 13.0297719,11.717455 L18.4,8.85333334  L18.4,8.02666667 C18.4,7.57034667 18.0528,7.20000001 17.625,7.20000001 Z"
                                            fill="#FFF" fill-rule="evenodd"></path>
                                    </svg>
                                    Continue with email
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>By signing up or logging in, you agree to our Terms & Conditions and Privacy Policy</p>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~End modal~~~~~~~~~~~~-->

    <!--~~~~~~~~~~~~~ Start Modal~~~~~~~~~~~~~~~~~~~~~-->
    <div class="modal account-modal fade" id="registratrionModal" tabindex="-1"
        aria-labelledby="registratrionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h5 class="modal-title">Help</h5>
                </div>
                <div class="modal-body">
                    <div class="modal-logo text-center">
                        <a href="{{ url('/') }}">
                            <img width="65" height="42"
                                src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png', '?' . time()) }}"
                                alt="Logo" class="Headerstyle__LogoStyled-x7dkhw-2 jTcymi">
                        </a>
                        <h5 class="text-muted">@lang('Registration')</h5>
                    </div>
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="user_type" value="11">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">@lang('First name') @include('admin.partials._utils')</label>
                                <input type="text" name="first_name" class="form-control"
                                    placeholder="@lang('First name')" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">@lang('Last name')</label>
                                <input type="text" name="last_name" class="form-control"
                                    placeholder="@lang('Last name')">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">@lang('Email') @include('admin.partials._utils')</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="@lang('Enter your email account')" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">@lang('Password') @include('admin.partials._utils') </label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="@lang('Enter password')" required>
                            </div>
                        </div>
                        <button type="submit" class="btn--base w-100 email">
                            <svg viewBox="0 0 24 24" width="24" height="24"
                                class="SvgIcon__SvgIconStyled-sc-1fos6oe-0 hbbopy">
                                <path
                                    d="M12,24 C5.37258301,24 0,18.627417 0,12 C0,5.37258301 5.37258301,0 12,0 C18.627417,0 24,5.37258301  24,12 C24,18.627417 18.627417,24 12,24 Z M6,10.3 L6,15.725 C6,16.1528 6.3472,16.5 6.775,16.5 L17.625,16.5  C18.0528,16.5 18.4,16.1528 18.4,15.725 L18.4,10.3 L12.9885562,13.0057219 C12.4921486,13.2539258 11.9078514,13.2539258  11.4114438,13.0057219 L6,10.3 Z M17.625,7.20000001 L6.775,7.20000001 C6.3472,7.20000001 6,7.57034667 6,8.02666667  L6,8.85333334 L11.3702281,11.717455 C11.8888356,11.9940456 12.5111644,11.9940456 13.0297719,11.717455 L18.4,8.85333334  L18.4,8.02666667 C18.4,7.57034667 18.0528,7.20000001 17.625,7.20000001 Z"
                                    fill="#FFF" fill-rule="evenodd"></path>
                            </svg>
                            @lang('Register')
                        </button>
                    </form>

                </div>
                <div class="modal-footer">
                    <p>By signing up or logging in, you agree to our Terms & Conditions and Privacy Policy</p>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~End modal~~~~~~~~~~~-->
    <!-- jquery -->
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- bootstrap js -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> <!-- swipper js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.0/swiper-bundle.min.js"></script> <!-- tweenMax js -->
    <script src="{{ URL::asset('assets/frontend') }}/js/TweenMax.min.js"></script>
    <!-- nice-select js file -->
    {{-- <script src="{{ URL::asset('assets/frontend') }}/js/jquery.nice-select.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- lightcase js file -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js"></script>
    <!-- multi-image-picker js file -->
    <script src="{{ URL::asset('assets/frontend') }}/js/multi-image-picker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/NicEdit/0.93/nicEdit.min.js"></script>
    <script src="//code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- main -->
    <script src="{{ URL::asset('assets/frontend') }}/js/front_end.js"></script>
    <script src="{{ URL::asset('assets/frontend') }}/js/main.js"></script>
    <script src="{{ URL::asset('core/public') }}/js/app.js"></script>
    <script>
        "use strict";
        bkLib.onDomLoaded(function() {
            $(".nicEdit").each(function(index) {
                $(this).attr("id", "nicEditor" + index);
                new nicEditor({
                    fullPanel: true
                }).panelInstance('nicEditor' + index, {
                    hasPanel: true
                });
            });
        });
        (function($) {
            $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                $('.nicEdit-main').focus();
            });
        })(jQuery);
    </script>
    <script>
        $(function() {
            data_src = "{{ route('frontend.ads.auto.search') }}";
            $("#search_text").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: data_src,
                        data: {
                            term: request.term
                        },
                        dataType: 'json',
                        success: function(data) {
                            response(data)
                        }
                    })
                },
                minLength: 1
            });
            $(document).on('click', '.ui-menu-item', function() {
                $('#search-form').submit();

            })

        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#description").keyup(function(event) {
                $("#text-count").text($(this).val().length);
                var x = $(this).val().length;

                if (x > 1450) {
                    $(this).css({
                        "border-color": "red"
                    });
                } else {
                    $(this).css({
                        "border-color": "#ccc"
                    });
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#titleLenth").keyup(function(event) {
                $("#text-count").text($(this).val().length);
                var x = $(this).val().length;

                if (x > 100) {
                    $(this).css({
                        "border-color": "red"
                    });
                } else {
                    $(this).css({
                        "border-color": "#ccc"
                    });
                }

            });
        });
    </script>
    @include('admin.partials.notify')

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    @yield('scripts')
</body>

</html>
