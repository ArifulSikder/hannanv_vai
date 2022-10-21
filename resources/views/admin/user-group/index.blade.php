@extends('admin.layout.master')
@section('title')
    @lang('user_group.list_page_title')
@endsection
@section('page-name')
    @lang('user_group.list_page_sub_title')
@endsection
@php
$roles = userRolePermissionArray();
@endphp
@section('content')
    @include('admin.user-group._breadcrumb')
    <div class="table-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-wrapper table-responsive">
                    <table class="custom-table small">
                        <thead>
                            <tr>
                                <th>@lang('tablehead.tbl_head_sl')</th>
                                <th>@lang('tablehead.tbl_head_name')</th>
                                <th>@lang('tablehead.tbl_head_role_assigned')</th>
                                <th>@lang('tablehead.tbl_head_created_at')</th>
                                <th>@lang('tablehead.tbl_head_action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $row->group_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.role.edit', [$row->role_id]) }}" target="_blank">
                                            {{ $row->role_name }}
                                        </a>
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        @if (hasAccessAbility('edit_user_group', $roles))
                                            <a class="text-white" href="{{ route('admin.user-group.edit', [$row->id]) }}">
                                                <button type="button" class="btn btn-sm btn-outline-primary mr-1"><i
                                                        class="la la-edit"></i>
                                                </button>
                                            </a>
                                        @endif
                                        @if (hasAccessAbility('delete_user_group', $roles))
                                            <a class="text-white" href="{{ route('admin.user-group.delete', [$row->id]) }}">
                                                <button type="button" class="btn btn-sm btn-outline-danger mr-1"><i
                                                        class="la la-trash"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
