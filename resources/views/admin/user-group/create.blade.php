@extends('admin.layout.master')
@section('user-group', 'active')
@section('page-name')
    @lang('user_group.new_page_sub_title')
@endsection
@section('content')
    @include('admin.user-group._breadcrumb')

    <div class="dashboard-form-area">
        {!! Form::open(['route' => 'admin.user-group.store', 'method' => 'post', 'class' => 'form-horizontal error']) !!}
        @csrf
        <div class="form-body">
            <div class="col-md-6 offset-3">
                <label>@lang('form.new_group_form_filed_name')</label>
                {!! Form::text('user_group_name', null, [
                    'class' => 'form-control form--control',
                    'data-validation-required-message' => __('form.field_required'),
                    'placeholder' => __('form.new_group_form_placeholder'),
                    'tabindex' => 1,
                ]) !!}
                @if ($errors->has('user_group_name'))
                    <div class="help-block">
                        <ul role="alert">
                            <li class="text-danger">{{ $errors->first('user_group_name') }}</li>
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-md-6 offset-3">

                <label>@lang('form.new_group_form_filed_role')</label>

                {!! Form::select('role', $role, null, [
                    'class' => 'form-control form--control',
                    'placeholder' => 'Select role name',
                    'data-validation-required-message' => __('form.field_required'),
                ]) !!}
                @if ($errors->has('role'))
                    <span class="alert alert-danger">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-actions text-center mt-3">
                <a href="{{ route('admin.user-group') }}">
                    <button type="button" class="btn btn--base bg--danger">
                        <i class="ft-x"></i> @lang('form.btn_cancle')
                    </button>
                </a>
                <button type="submit" class="btn--base">
                    <i class="la la-check-square-o"></i> @lang('form.btn_save')
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
