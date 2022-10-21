<div class="dashboard-title-part">
    <h5 class="title">@lang('Dashboard')</h5>
    <div href="" class="dashboard-path">
        <a href={{ route('admin.dashboard') }}>
            <span class="main-path">@lang('Dashboard')</span>
        </a>
        <i class="las la-angle-right"></i>
        <a href="{{ route('admin.city.index') }}">
            <span class="active-path g-color">@lang('City List')</span>
        </a>
    </div>
    <div class="view-prodact">
        <a href="{{ route('admin.city.create') }}">
            <i class="las la-plus"></i>
            <span>@lang('Add City')</span>
        </a>
    </div>
</div>
