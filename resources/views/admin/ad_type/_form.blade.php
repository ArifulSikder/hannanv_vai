@csrf
<div class="row">
    <div class="col-6 mb-2">
        <label for="title">@lang('Name') @include('admin.partials._utils')</label>
        <input id="category_name" type="text" name="title"
            class="form-control form--control {{ $errors->has('title') ? 'is-invalid' : '' }}"
            placeholder="@lang('Name')" value="{{ @old('title', $row['title']) }}">
        @if ($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>
    <div class="col-6 mb-2">
        <label for="price">@lang('Amount') @include('admin.partials._utils')</label>
        <input id="price" type="text" name="price"
            class="form-control form--control {{ $errors->has('price') ? 'is-invalid' : '' }}"
            placeholder="@lang('Name')" value="{{ @old('price', $row['price']) }}">
        @if ($errors->has('price'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('price') }}</strong>
            </div>
        @endif
    </div>

    <div class="col-6 mb-2">
        <label for="startDate">@lang('Start') @include('admin.partials._utils')</label>
        <input id="startDate" name="start_date" class="form-control form--control" type="datetime-local"
            value="{{ @old('start_date', $row['start_date']) }}" />
        @if ($errors->has('start_date'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('start_date') }}</strong>
            </div>
        @endif
    </div>
    <div class="col-6 mb-2">
        <label for="endDate">@lang('End') @include('admin.partials._utils')</label>
        <input id="endDate" name="end_date" class="form-control form--control" type="datetime-local"
            value="{{ @old('end_date', $row['end_date']) }}" />
        @if ($errors->has('end_date'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('end_date') }}</strong>
            </div>
        @endif
    </div>

</div>
<a href="{{ route('admin.category.index') }}" class="btn btn--base bg--danger">@lang('Cancel')</a>
<button type="submit" class="btn btn--base">{{ $buttonText }}</button>
