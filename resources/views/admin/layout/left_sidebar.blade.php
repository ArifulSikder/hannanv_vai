<div class="sidebar__menu-wrapper">
    <ul class="sidebar__menu">
        <li class="sidebar-menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="menu-icon las la-home"></i>
                <span class="menu-title">@lang('Dashboard')</span>
            </a>
        </li>
        <li class="sidebar-menu-item {{ Request::is('currency/list') ? 'active' : '' }}">
            <a href="{{ route('admin.currency.index') }}" class="nav-link">
                <i class="menu-icon las la-dot-circle"></i>
                <span class="menu-title">@lang('Currency')</span>
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
                <span class="menu-title">@lang('Manage Roles')</span>
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
        <li
            class="sidebar-menu-item">
            <a href="{{ route('admin.advertiser.all') }}">
                <i class="menu-icon las la-user-edit"></i>
                <span class="menu-title">Advertiser &nbsp; </span>
            </a>

        </li>

        <li
            class="sidebar-menu-item">
            <a href="{{ route('admin.all.ads') }}">
                <i class="menu-icon las la-user-edit"></i>
                <span class="menu-title">@Lang('All Ads') </span>
            </a>

        </li>
        <li
            class="sidebar-menu-item">
            <a href="{{ route('admin.all.report') }}">
                <i class="menu-icon las la-user-edit"></i>
                <span class="menu-title">@Lang('Reports of Ads') </span>
            </a>

        </li>


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

        <li class="sidebar__menu-header">@lang('CATALOG')</li>
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.city.index') }}" class="">
                <i class="menu-icon las la-terminal"></i>
                <span class="menu-title">@lang('All City')</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="{{ route('admin.category.index') }}" class="">
                <i class="menu-icon las la-terminal"></i>
                <span class="menu-title">@lang('All Category')</span>
            </a>

        </li>
        {{-- <li class="sidebar-menu-item">
            <a href="{{ route('admin.category-item.index') }}" class="">
                <i class="menu-icon las la-terminal"></i>
                <span class="menu-title">@lang('Category Items')</span>
            </a>

        </li> --}}
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.type.index') }}" class="">
                <i class="menu-icon las la-terminal"></i>
                <span class="menu-title">@lang('Ad Types')</span>
            </a>

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
                    <a href="{{ route('admin.setting.social.media.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('setting/social/media') ? 'text--base' : ' ' }}">@lang('Social Media')</span>
                    </a>
                    <a href="{{ route('admin.setting.apps.index') }}" class="nav-link">
                        <i class="menu-icon las la-dot-circle"></i>
                        <span class="menu-title {{ Request::is('setting/apps/setting') ? 'text--base' : ' ' }}">@lang('App Settings')</span>
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
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.language.index') }}">
                <i class="menu-icon las la-language"></i>
                <span
                    class="menu-title {{ Request::is('language/list') ? 'text--base' : ' ' }}">@lang('Language')</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ route('admin.cms.index') }}">
                <i class="menu-icon las la-language"></i>
                <span class="menu-title {{ Request::is('pages') ? 'text--base' : ' ' }}">@lang('Manage Page')</span>
            </a>
        </li>
        <li class="sidebar-menu-item">
            <a href="{{ url('contact/index') }}">
                <i class="menu-icon las la-language"></i>
                <span class="menu-title {{ Request::is('contact') ? 'text--base' : ' ' }}">@lang('Contact Query')</span>
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
