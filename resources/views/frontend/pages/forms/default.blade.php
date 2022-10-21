@extends('frontend.layout.main')
@push('custom_css')
@endpush
@section('content')
    <section class="sell-car-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10">@lang('POST AN AD')</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-add-info-area">
                        <div class="sell-add-info-header">
                            <h3 class="sell-add-info-title">@lang('SELECTED CATEGORY')</h3>
                            <div class="change-cetagory-wrapper">
                                @include('frontend.pages.forms.breadcrumb')
                            </div>
                            @if ($errors->any())
                                <div id="msgDiv" class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    Please check the form below for errors
                                </div>
                            @endif
                            <form class="sell-add-info-form" action="{{ route('frontend.user.adStore') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <input type="hidden" name="category_type" value="{{ $category->category_type }}">
                                <div class="row mb-30-none">
                                    <div class="col-xl-8 mb-30">
                                        <div class="sell-add-info-body-wrapper">
                                            <h3 class="sell-add-info-body-title">@lang('ADD SOME INFO')</h3>
                                            <div class="form-group">
                                                <label>Advert title <span class="text--danger">*</span></label>
                                                <input type="text" name="title" class="form--control"
                                                    placeholder="@lang('Advert title')" value="{{ old('title') }}" required>
                                                <div class="text-limit-area">
                                                    <span>Mention key features of your product (e.g. make, model, age,
                                                        type)</span>
                                                    <span>0 / 70</span>
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>Explanation <span class="text--danger">*</span></label>
                                                <textarea id="description" class="form--control" name="description" placeholder="@lang('Description')" required>{{ old('description') }}</textarea>
                                                <div class="text-limit-area">
                                                    <span>Add information such as status, feature and reason for sale</span>
                                                    <span id="text-count">1</span>/ 1450
                                                </div>
                                            </div>
                                            <div class="form-group2">
                                                <label>@lang('Google Map Location') <a target="_blank" class="text-primary"
                                                        href="https://support.google.com/maps/answer/144361?hl=en&co=GENIE.Platform%3DDesktop#:~:text=Embed%20a%20map%20or%20directions&text=Click%20Share%20or%20embed%20map,Click%20Embed%20map.&text=Copy%20the%20text%20in%20the,of%20your%20website%20or%20blog.">@lang('Instruction')</a></label>
                                                <textarea class="form--control" name="location_embeded_map" placeholder="@lang('Google Map Location')"></textarea>

                                            </div>
                                            <div class="form-group2 mt-2">
                                                <label>@lang('Thumbnail')<span class="text--danger">*</span></label>
                                                <input type="file" class="form--control" name="image"
                                                    placeholder="@lang('Thumbnail')" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title">@lang('Price')</h3>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="form-group price-input-badge">
                                                <label>@lang('Price') <span class="text--danger">*</span></label>
                                                <input type="number" name="price" class="form--control"
                                                    placeholder="@lang('Price')" required>
                                                <span>₺</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sell-add-info-price-wrapper">
                                    <h3 class="sell-add-info-price-title two">YOU CAN UPLOAD UP TO 10 PHOTOS</h3>
                                    <span class="image-up-alart-text pb-10">(Alart: Heigh 1000x800 px / size 2MB)</span>
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="add-more-details-thumb-wrapper">
                                                <div class="add-more-details-thumb-area">
                                                    <div class="row" id="coba">
                                                        <div class="col-4 spartan_item_wrapper" data-spartanindexrow="0"
                                                            style="margin-bottom : 20px; ">
                                                            <div style="position: relative;">
                                                                <div class="spartan_item_loader" data-spartanindexloader="0"
                                                                    style=" position: absolute; width: 100%; height: auto; background: rgba(255,255,255, 0.7); z-index: 22; text-align: center; align-items: center; margin: auto; justify-content: center; flex-direction: column; display : none; font-size : 1.7em; color: #CECECE">
                                                                    <i class="fas fa-sync fa-spin"></i>
                                                                </div><label class="file_upload"
                                                                    style="width: 100%; height: auto; border: 2px dashed #ddd; border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; padding: 5px; margin-top: 5px; margin-bottom : 5px; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;"><a
                                                                        href="javascript:void(0)"
                                                                        data-spartanindexremove="0"
                                                                        style="position: absolute !important; right : 3px; top: 3px; display : none; background : transparent; border-radius: 3px; width: 30px; height: 30px; line-height : 30px; text-align: center; text-decoration : none; color : #ff0700;"
                                                                        class="spartan_remove_row"><i
                                                                            class="las la-trash"></i></a><img
                                                                        style="width: 100%; margin: 0 auto; vertical-align: middle;"
                                                                        data-spartanindexi="0"
                                                                        src="assets/images/gallery.jpg"
                                                                        class="spartan_image_placeholder">
                                                                    <p data-spartanlbldropfile="0"
                                                                        style="color : #5FAAE1; display: none; width : auto; ">
                                                                        Drop Here</p><img
                                                                        style="width: 100%; vertical-align: middle; display:none;"
                                                                        class="img_" data-spartanindeximage="0"><input
                                                                        class="form-control spartan_image_input"
                                                                        accept="image/*" data-spartanindexinput="0"
                                                                        style="display : none" name="images[]"
                                                                        type="file">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <input type="file" name="images[]" multiple> --}}

                                    <div class="form-group col-8">
                                        <div class="sell-add-info-switcher pt-20">
                                            <div class="title-area">
                                                <span class="title">Show my phone number in ads</span>
                                            </div>
                                            <div class="setting-tab">
                                                <span
                                                    class="setting-tab-switcher {{ Auth::guard('advertiser')->user()->show_mobile_no == 1 ? 'active' : ' ' }}">
                                                    <input
                                                        onclick="location.href='{{ route('frontend.user.mobile.status', [Auth::guard('advertiser')->user()->id, Auth::guard('advertiser')->user()->show_mobile_no ? 0 : 1]) }}'"
                                                        type="checkbox"
                                                        data-id="{{ Auth::guard('advertiser')->user()->id }}"
                                                        name="show_mobile_no" class="dropzone toggle-class"
                                                        autocomplete="off">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($sub_category->category_type == 'vehicles' && ($sub_category->wheels = 2))
                                    @include('frontend.pages.forms._4wheeler')
                                @elseif ($sub_category->category_type == 'vehicles' && ($sub_category->wheels = 4))
                                    {{-- @dd('ok mobile form working and ad posting successfull'); --}}
                                    @include('frontend.pages.forms._4wheeler')
                                @elseif($sub_category->category_type == 'mobiles')
                                    {{-- @dd('ok mobile form working and ad posting successfull'); --}}
                                    @include('frontend.pages.forms.mobiles')
                                @elseif($sub_category->category_type == 'sports')
                                    @dd('Form for sports');
                                @elseif($sub_category->category_type == 'electronics')
                                    @include('frontend.pages.forms.electronics')
                                @elseif($sub_category->category_type == 'home_and_garden')
                                    @include('frontend.pages.forms.home_and_garden')
                                @elseif($sub_category->category_type == 'fashion_beauty')
                                    @include('frontend.pages.forms.fashion_beauty')
                                @else
                                    @include('frontend.pages.forms._basic')
                                @endif
                                <div class="sell-add-info-price-wrapper">
                                    <div class="row mb-30-none">
                                        <div class="col-xl-8 mb-30">
                                            <div class="sell-add-btn-area">
                                                <button type="submit" class="btn--base">@lang('Advertise now')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
