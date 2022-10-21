@php
    $user = \App\Models\Auth::first();
    dd($user);
@endphp
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
        <li><a href="my-ads.html">
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
        <li><a href="{{ url('dashboard/setting', 9) }}">
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
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">

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