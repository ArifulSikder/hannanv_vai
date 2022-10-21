@extends('admin.layout.master')
@section('title')
    @lang('Categories')
@endsection
@section('category-name')
    @lang('Categories')
@endsection

@section('content')
    @include('admin.category._breadcrumb')
    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('SL')</th>
                            <th scope="col">@lang('Parent')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Slug')</th>
                            <th scope="col">@lang('Icon')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rows))
                            @foreach ($rows as $key => $item)
                                @if (!isset($item->parent_category->title))
                                    <?php $parent_category = 'ROOT'; ?>
                                @else
                                    <?php $parent_category = $item->parent_category->title; ?>
                                @endif
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ $parent_category }}
                                    </td>
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{!! $item->icon !!}</i></td>
                                    <td>
                                        @if ($item['status'] == 1)
                                            <a title="Change" item_id="{{ $item['id'] }}"
                                                class="text-success item_status" id="item_{{ $item['id'] }}"
                                                href="javascript:void(0)">
                                                @lang('Active')
                                            </a>
                                        @else
                                            <a title="Change" class="item_status text-warning"
                                                id="item_{{ $item['id'] }}" item_id="{{ $item['id'] }}"
                                                href="javascript:void(0)">@lang('Inactive')
                                            </a>
                                        @endif

                                    </td>
                                    <td><a title="@lang('Edit')"
                                            href="{{ route('admin.category.edit', $item['id']) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.category.delete', $item['id']) }}">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="la la-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No {{ $title }} found</td>
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
                url: '{{ route('admin.category.status') }}',
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
