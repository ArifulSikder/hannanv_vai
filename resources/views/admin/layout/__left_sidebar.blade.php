<div class="sidebar__menu-wrapper">
    <ul class="sidebar__menu">
        <li class="sidebar-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="menu-icon las la-home"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="sidebar-menu-item {{ Request::is('currency/list') ? 'active' : '' }}">
            <a href="{{ route('admin.currency.index') }}" class="nav-link">
                <i class="menu-icon las la-dot-circle"></i>
                <span class="menu-title">Currency</span>
            </a>
        </li>
        <li class="sidebar-menu-item sidebar-dropdown @if (Request::is('admin-users') || Request::is('user-group') || Request::is('admin-user/new')) active @endif">
            <a href="#">
                <i class="menu-icon las la-user-edit"></i>
                <span class="menu-title">@lang('left_menu.admin_management')</span>
            </a>
            <ul class="sidebar-submenu"
                @if (Request::is('admin-users') || Request::is('user-group') || Request::is('admin-user/new')) style="display:block"
            @else
                style="display:none" @endif>
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.admin-user') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title">@lang('left_menu.admin_user')</span>
                    </a>
                    <a href="{{ route('admin.user-group') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title">User group</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item sidebar-dropdown @if (Request::is('role')) active @endif">
            <a href="#">
                <i class="menu-icon las la-user-edit"></i>
                <span class="menu-title">Manage Roles</span>
            </a>
            <ul class="sidebar-submenu"
                @if (Request::is('role') || Request::is('permission-group') || Request::is('permission')) style="display:block"
            @else
                style="display:none" @endif>
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.role') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title @if (Request::is('role')) text--base @endif">@lang('left_menu.role')</span>
                    </a>
                    <a href="{{ route('admin.permission-group') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title @if (Request::is('permission-group')) text--base @endif">@lang('left_menu.menus')</span>
                    </a>
                    <a href="{{ route('admin.permission.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title @if (Request::is('permission')) text--base @endif">@lang('left_menu.actions')</span>

                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('users*') ? 'active' : '' }}">
            <a href="#">
                <i class="menu-icon las la-user-edit"></i>
                <span class="menu-title">Manage Users</span>
                <div class="sidebar-item-badge">
                    @if ($users_count)
                        <span>{{ $users_count }}</span>
                    @else
                        <span>0</span>
                    @endif
                </div>
            </a>
            <ul class="sidebar-submenu"
                @if (Request::is('users*')) style="display:block"
            @else
                style="display:none" @endif>
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.users.all') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title @if (Request::is('users/list')) text--base @endif">All Users</span>
                        <div class="sidebar-item-badge">
                            @if ($users_count)
                                <span>{{ $users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.active') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/active') ? 'text--base' : '' }}">Active
                            Users</span>
                        <div class="sidebar-item-badge style">
                            @if ($active_users_count)
                                <span>{{ $active_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.banned') }}"
                        class="nav-link  {{ Route::currentRouteName() == 'admin.users.banned' ? 'active' : '' }}">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/banned') ? 'text--base' : '' }}">Banned
                            Users</span>
                        <div class="sidebar-item-badge style">
                            @if ($banned_users_count)
                                <span>{{ $banned_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.email.verified') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/email-verified') ? 'text--base' : '' }}">Email
                            Verified </span>
                        <div class="sidebar-item-badge style">
                            @if ($email_verified_users_count)
                                <span>{{ $email_verified_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.email.unverified') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/email-unverified') ? 'text--base' : '' }}">Email
                            Unverified</span>
                        <div class="sidebar-item-badge style">
                            @if ($email_unverified_users_count)
                                <span>{{ $email_unverified_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.sms.verified') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/sms-verified') ? 'text--base' : '' }}">SMS
                            Verified</span>
                        <div class="sidebar-item-badge style">
                            @if ($sms_verified_users_count)
                                <span>{{ $sms_verified_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.sms.unverified') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/sms-unverified') ? 'text--base' : '' }}">SMS
                            Unverified</span>
                        <div class="sidebar-item-badge style">
                            @if ($sms_unverified_users_count)
                                <span>{{ $sms_unverified_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.kyc.verified') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/kyc-verified') ? 'text--base' : '' }}">KYC
                            Verified</span>
                        <div class="sidebar-item-badge style">
                            @if ($kyc_verified_users_count)
                                <span>{{ $kyc_verified_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.kyc.unverified') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/kyc-unverified') ? 'text--base' : '' }}">KYC
                            Unverified</span>
                        <div class="sidebar-item-badge style">
                            @if ($kyc_unverified_users_count)
                                <span>{{ $kyc_unverified_users_count }}</span>
                            @else
                                <span>0</span>
                            @endif
                        </div>
                    </a>
                    <a href="{{ route('admin.users.email.all') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('users/send-email') ? 'text--base' : '' }}">Email To
                            Users</span>
                    </a>

                </li>

            </ul>
        </li>
        <li class="sidebar__menu-header">@lang('Support')</li>
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('tickets*') ? 'active' : ' ' }}">
            <a href="#">
                <i class="menu-icon las la-cog"></i>
                <span class="menu-title">@lang('Tickets')</span>
                <div class="sidebar-item-badge">
                    <span>{{ \DB::table('support_tickets')->count() }}</span>
                </div>
            </a>

            <ul class="sidebar-submenu {{ Request::is('tickets*') ? 'd-block' : ' ' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.tickets.pending') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('tickets/pending') ? 'text--base' : '' }}">Pending</span>
                    </a>
                    <a href="{{ route('admin.tickets.answered') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('tickets/answered') ? 'text--base' : '' }}">Answered</span>
                    </a>
                    <a href="{{ route('admin.tickets.closed') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('tickets/closed') ? 'text--base' : '' }}">Closed</span>
                    </a>
                    <a href="{{ route('admin.tickets.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('tickets/index') ? 'text--base' : '' }}">All</span>
                    </a>
                </li>
            </ul>
        </li>

        @if ($general->kyc_verification == 1)
            <li class="sidebar__menu-header">MANAGE KYC</li>
            <li class="sidebar-menu-item @if (Request::is('kyc/edit')) active @endif">
                <a href="{{ route('admin.kyc.edit') }}">
                    <i class="menu-icon lab la-wpforms"></i>
                    <span class="menu-title">KYC Form</span>
                </a>
            </li>
        @endif
        <li class="sidebar__menu-header">NOTIFY SETTINGS</li>
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('email-template*') ? 'active' : '' }}">
            <a href="#" class="">
                <i class="menu-icon las la-envelope-open-text"></i>
                <span class="menu-title">Email Manager</span>
            </a>
            <ul class="sidebar-submenu" @if (Request::is('email-template*')) style="display:block" @endif>

                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.email.template.global') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('email-template/global') ? 'text--base' : '' }}">Global
                            Template</span>
                    </a>
                    <a href="{{ route('admin.email.template.index') }}" class="nav-link active">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('email-template/index') ? 'text--base' : '' }}">Default
                            Template</span>
                    </a>
                    <a href="{{ route('admin.email.template.setting') }}" class="nav-link ">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('email-template/setting') ? 'text--base' : '' }}">Email
                            Configuration</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('sms-template*') ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="menu-icon las la-sms"></i>
                <span class="menu-title">SMS Manager</span>
            </a>
            <ul class="sidebar-submenu {{ Request::is('sms-template*') ? 'd-block' : '' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.sms.template.setting') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('sms-template/setting') ? 'text--base' : ' ' }}">SMS Gateways</span>                    </a>
                    <a href="{{ route('admin.sms.template.global') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('sms-template/global') ? 'text--base' : ' ' }}">Global Settings</span>
                    </a>
                    <a href="{{ route('admin.sms.template.global') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('sms-template/index') ? 'text--base' : ' ' }}">SMS Template</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="sidebar__menu-header">@lang('FRONTEND MANAGER')</li>
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('frontend*') ? 'active' : ' ' }}">
            <a href="#" class="">
                <i class="menu-icon las la-terminal"></i>
                <span class="menu-title">@lang('Manage Section')</span>
            </a>
            <ul class="sidebar-submenu {{ Request::is('frontend*') ? 'd-block' : ' ' }}">
                @php
                    $lastSegment = collect(request()->segments())->last();
                @endphp
                {{-- @dd(Route::current()->getName()); --}}
                <li class="sidebar-menu-item ">
                    @foreach (getPageSections(true) as $k => $secs)
                        @if ($secs['builder'])
                            <a href="{{ route('admin.frontend.sections', $k) }}" class="nav-link">

                                <i class="menu-icon las la-dot-circle"></i>
                                <span
                                    class="menu-title @if ($lastSegment == $k) text--base @endif">{{ __($secs['name']) }}</span>
                            </a>
                        @endif
                    @endforeach

                </li>
            </ul>

            {{-- {{ Request::is('frontend/sections/about_us') || Request::is('frontend/sections/authentication') || Request::is('frontend/sections/banner')    ? 'text--base' : ' ' }} --}}
        </li>

        <li class="sidebar__menu-header">Settings</li>
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('setting*') ? 'active' : ' ' }}">
            <a href="#">
                <i class="menu-icon las la-cog"></i>
                <span class="menu-title">General Settings</span>
            </a>

            <ul class="sidebar-submenu {{ Request::is('setting*') ? 'd-block' : ' ' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.setting.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('setting/index') ? 'text--base' : ' ' }}">Site
                            Settings</span>
                    </a>
                    <a href="{{ route('admin.setting.logo.icon') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('setting/logo-icon') ? 'text--base' : ' ' }}">Logo &
                            favicon</span>
                    </a>

                    <a href="{{ route('admin.setting.extensions.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('setting/logo-icon') ? 'text--base' : ' ' }}">Extensions</span>
                    </a>

                </li>
            </ul>
        </li>
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('payment/gateway*') ? 'active' : ' ' }}">
            <a href="#">
                <i class="menu-icon las la-cog"></i>
                <span class="menu-title">Payment Gateways</span>
            </a>
            <ul class="sidebar-submenu {{ Request::is('payment/gateway*') ? 'd-block' : ' ' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.gateway.automatic.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('payment/gateway/automatic/index') ? 'text--base' : ' ' }}">Automatic</span>
                    </a>
                    <a href="{{ route('admin.gateway.manual.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('payment/gateway/manual/index') ? 'text--base' : ' ' }}">Manual</span>
                    </a>
                </li>
            </ul>

        </li>
        @if ($general->deposit_status !== 0 && $general->deposit_status !== null)
        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('deposit*') ? 'active' : ' ' }}">
            <a href="#">
                <i class="menu-icon las la-credit-card"></i>
                <span class="menu-title">@lang('Deposits')</span>
            </a>
            <ul class="sidebar-submenu {{ Request::is('deposit*') ? 'd-block' : ' ' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.deposit.pending') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('deposit/pending') ? 'text--base' : ' ' }}">@lang('Pending Deposits')</span>
                        @if ($pending_deposits_count)
                            <div class="sidebar-item-badge style">
                                <span>{{ $pending_deposits_count }}</span>
                            </div>
                        @endif
                    </a>
                    <a href="{{ route('admin.deposit.approved') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('deposit/approved') ? 'text--base' : ' ' }}">@lang('Approved')</span>
                    </a>
                    <a href="{{ route('admin.deposit.successful') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('deposit/successful') ? 'text--base' : ' ' }}">@lang('Successful Deposits')</span>
                    </a>
                    <a href="{{ route('admin.deposit.rejected') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('deposit/rejected') ? 'text--base' : ' ' }}">@lang('Rejected Deposits')</span>
                    </a>
                    <a href="{{ route('admin.deposit.list') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span
                            class="menu-title {{ Request::is('deposit/list') ? 'text--base' : ' ' }}">@lang('All Deposits')</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if ($general->withdraw_status !== 0 && $general->withdraw_status !== null)

        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('withdraw*') ? 'active' : ' ' }}">
            <a href="#">
                <i class="menu-icon las la-credit-card"></i>
                <span class="menu-title">@lang('Withdraw')</span>
            </a>
            <ul class="sidebar-submenu {{ Request::is('withdraw*') ? 'd-block' : ' ' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.withdraw.method.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title">@lang('Withdrawal Methods')</span>
                    </a>
                    <a href="{{ route('admin.withdraw.pending') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('withdraw/pending') ? 'text--base' : ' ' }}">@lang('Pending Log')</span>

                        @if ($pending_withdraw_count)
                            <span class="menu-badge pill bg--primary ml-auto">{{ $pending_withdraw_count }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.withdraw.approved') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('withdraw/approved') ? 'text--base' : ' ' }}">@lang('Approved Log')</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.language.index') }}">
                <i class="menu-icon las la-language"></i>
                <span
                    class="menu-title {{ Request::is('language/list') ? 'text--base' : ' ' }}">@lang('Language')</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.setting.seo.page') }}">
                <i class="menu-icon las la-globe"></i>
                <span class="menu-title">SEO Manager</span>
            </a>
        </li>

        <li class="sidebar-menu-item sidebar-dropdown {{ Request::is('extra*') ? 'active' : ' ' }}">
            <a href="#">
                <i class="menu-icon las la-cog"></i>
                <span class="menu-title">Extra</span>
            </a>
            <ul class="sidebar-submenu {{ Request::is('extra*') ? 'd-block' : ' ' }}">
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.extra.clear.cache') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('extra') ? 'text--base' : ' ' }}">Clear Cache</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('admin.extra.system.info') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('extra/system/info') ? 'text--base' : ' ' }}">System
                            Information</span>
                    </a>
                </li>
            </ul>

        </li>

    </ul>
    </li>
    </ul>
</div>
