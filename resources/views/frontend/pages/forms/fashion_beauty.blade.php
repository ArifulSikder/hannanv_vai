<div class="sell-add-info-body-wrapper">
    <div class="form-group col-8">
        <label>Condition</label>
        <select name="condition" class="form--control {{ $errors->has('condition') ? 'is-invalid' : '' }}">
            <option value="">@lang('Select')</option>
            <option value="used">Used</option>
            <option value="new">New</option>
            <option value="like new">Like New</option>
        </select>
    </div>

    <div class="form-group col-8">
        <label>Brand (optional)</label>
        <input type="text" name="brand" value="{{ old('brand') }}" class="form--control" placeholder="@lang('Brand ')">
    </div>
</div>
