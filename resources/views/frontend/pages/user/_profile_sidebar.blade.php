<div class="col-xl-3 col-lg-4 col-md-5 mb-30">
    <div class="setting-side-nav">
        @if (!empty(Auth::guard('advertiser')->user()->id))
            <ul class="setting-nav-list">
                <li><a href="{{ route('frontend.user.setting', Auth::guard('advertiser')->user()->id) }}"
                        @if (Request::is('dashboard/setting*')) class="active" @endif>@lang('Security')</a></li>
                <li><a href="{{ route('frontend.user.update.profile', Auth::guard('advertiser')->user()->id) }}"
                        @if (Request::is('dashboard/profile*')) class="active" @endif>@lang('Profile')</a></li>
                <li><a href="{{ route('frontend.user.update.photo', Auth::guard('advertiser')->user()->id) }}"
                        @if (Request::is('dashboard/profile*')) class="active" @endif>@lang('Profile Picture')</a></li>
                <li><a href="{{ route('frontend.user.device.logout') }}">Sign out from all
                        devices</a></li>
                <li>
                    <a href="{{ route('frontend.user.delete', Auth::guard('advertiser')->user()->id) }}">Delete my
                        account and forget me</a>
                </li>
                <li><a href="#">Chat security tips</a></li>
                <div class="view-profile-btn mt-30">
                    <a href="{{ route('frontend.user.view.profile', Auth::guard('advertiser')->user()->id) }}"
                        class="btn--base w-100">View
                        profile</a>
                </div>
            </ul>
        @endif
    </div>
</div>
