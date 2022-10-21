@extends('admin.layout.master')
@section('title')
    @lang('Cities')
@endsection
@section('page-name')
    @lang('Cities')
@endsection

@section('content')
    @include('admin.city._breadcam')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Country')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Slug')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rows))
                            @foreach ($rows as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ 'Turkey' }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        @if ($item['status'] == 1)
                                            <a title="Change" item_id="{{ $item['id'] }}"
                                                class="text-success item_status" id="item_{{ $item['id'] }}"
                                                href="javascript:void(0)">
                                                Active
                                            </a>
                                        @else
                                            <a title="Change" class="item_status text-warning"
                                                id="item_{{ $item['id'] }}" item_id="{{ $item['id'] }}"
                                                href="javascript:void(0)">Inactive
                                            </a>
                                        @endif

                                    </td>
                                    <td><a title="@lang('Edit')" href="{{ route('admin.city.edit', $item['id']) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.city.delete', $item['id']) }}">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">{{ $emptyMessage }}</td>
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
                url: '{{ route('admin.city.status') }}',
                data: {
                    status: status,
                    item_id: item_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $("#item_" + category_item_id).html(
                            "<a href='javascript:void(0)' class='item_status'>Inactive</a>"
                        )
                    } else if (resp['status'] == 1) {
                        $("#item_" + category_item_id).html(
                            "<a href='javascript:void(0)' class='item_status'>Active</a>"
                        )
                    }
                    setTimeout(function() {
                        $(".item_status").reload(location.href +
                            " .item_status");
                    }, 1500);
                }
            });
        });
    </script>
@endsection
