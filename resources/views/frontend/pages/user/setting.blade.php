@extends('frontend.layout.main')
@section('content')
    <!--~~~~~~~~~~~~~~Start Breadcrumb~~~~~~~~~~~~~~-->
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="#"><i class="las la-angle-right"></i> My ADS</a>
                </li>
            </ul>
        </div>
    </div>
    <section class="setting-section pb-60 pt-30">
        <div class="container">
            <div class="row mb-30-none">
                @include('frontend.pages.user._profile_sidebar')
                <div class="col-xl-9 col-lg-8 col-md-7 mb-30">
                    <div class="setting-content-area">
                        <div class="setting-content-header">
                            <h3 class="title">My ad settings</h3>
                        </div>
                        <div class="setting-content two">
                            <div class="title-area">
                                <h4 class="title">Show my phone number in ads</h4>
                            </div>

                            <div class="setting-tab">
                                <span class="setting-tab-switcher {{ $userDetails->show_mobile_no == 1 ? 'active' : ' ' }}">
                                    <input
                                        onclick="location.href='{{ route('frontend.user.mobile.status', [$userDetails['id'], $userDetails->show_mobile_no ? 0 : 1]) }}'"
                                        type="checkbox" data-id="{{ $userDetails->id }}" name="show_mobile_no"
                                        class="dropzone toggle-class" autocomplete="off">
                                </span>

                            </div>
                        </div>
                    </div>
                    <div class="setting-content-area mt-20">
                        <div class="setting-content-header">
                            <h3 class="title">@lang('Create Password')</h3>
                        </div>

                        <div class="setting-content two">
                            <form class="ad-pass-form w-100" action="{{ route('frontend.user.update.password') }}"
                                method="post">
                                @csrf
                                <div class="ad-pass-input-area">
                                    <div class="ad-pass-input form-group">
                                        <input type="text" class="form--control" name="email"
                                            placeholder="New Password" readonly value="{{ $userDetails->email }}">
                                    </div>
                                    <div class="ad-pass-input form-group">
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password" placeholder="@lang('Enter current password')" required>
                                        <span id="check_current_password"></span>
                                    </div>
                                    <div class="ad-pass-input form-group">
                                        <input type="password" name="new_password" class="form-control" id="new_password"
                                            placeholder="@lang('Enter new password')" required>
                                    </div>

                                    <div class="ad-pass-input form-group">
                                        <input type="password" name="again_new_password" class="form-control rounded-0"
                                            id="again_new_password" placeholder="@lang('Confirm new password')">

                                    </div>

                                </div>
                                <div class="ad-pass-btn pt-10">
                                    <button type="submit" class="btn--base">@lang('Create Password')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        //Current password checking
        $("#current_password").keyup(function() {
            var current_password = $("#current_password").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('frontend.user.check.password') }}',
                data: {
                    current_password: current_password
                },
                success: function(resp) {
                    if (resp == "false") {
                        $("#check_current_password").html(
                            "<font color=red>Current passsword is wrong</font>")
                    } else if (resp == "true") {
                        $("#check_current_password").html(
                            "<font color=green>Current passsword is correct</font>")
                    }
                }
            });
        });
    </script>
@endsection
