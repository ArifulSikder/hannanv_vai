@extends('admin.layout.master')
@section('title')
    @lang('Ad Types')
@endsection
@section('category-name')
    @lang('Ad Types')
@endsection

@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">@lang('Dashboard')</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">@lang('Dashboard')</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="{{ route('admin.type.index') }}">
                <span class="active-path g-color">@lang('Ad Types')</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.type.create') }}">
                <i class="las la-plus"></i>
                <span>@lang('Add Type')</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Slug')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Price')</th>
                            <th scope="col">@lang('Duration In Days')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rows))
                            @foreach ($rows as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        @if ($item['status'] == 1)
                                            <a title="Change" item_id="{{ $item->id }}" class="text-success item_status"
                                                id="item_{{ $item->id }}" href="javascript:void(0)">
                                                Active
                                            </a>
                                        @else
                                            <a title="Change" class="item_status text-warning" id="item_{{ $item->id }}"
                                                item_id="{{ $item->id }}" href="javascript:void(0)">Inactive
                                            </a>
                                        @endif
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        @php
                                            $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $item->end_date);
                                            $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $item->start_date);
                                            $diff_in_days = $end_date->diffInDays($start_date);
                                        @endphp
                                        <span class="text-success">{{ $diff_in_days }}</span>
                                    </td>
                                    <td><a title="@lang('Edit')" href="{{ route('admin.type.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.type.delete', $item->id) }}">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">{{ $emptyMessage }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- card end -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".item_status", function() {
            var status = $(this).text();
            var item_id = $(this).attr("item_id");
            $.ajax({
                type: 'post',
                url: '{{ route('admin.type.status') }}',
                data: {
                    status: status,
                    item_id: item_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $("#item_" + item_id).html(
                            "<a href='javascript:void(0)' class='item_status'>Inactive</a>"
                        )
                    } else if (resp['status'] == 1) {
                        $("#item_" + item_id).html(
                            "<a href='javascript:void(0)' class='item_status'>Active</a>"
                        )
                    }
                    setTimeout(function() {
                        $(".item_status").reload(location.href + " .item_status");
                    }, 1500);
                }
            });
        });
    </script>
@endsection
