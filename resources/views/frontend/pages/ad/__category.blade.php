@extends('frontend.layout.main')
@section('content')
    <section class="sell-section pt-30">
        <div class="container">
            <h1 class="sell-header-title pb-10">POST AN AD</h1>
            <div class="row justify-content-center mb-30">
                <div class="col-xl-8 mb-30">
                    <div class="sell-cetagory-main-wrapper">
                        <h3 class="sell-cetagory-main-title">@lang('CHOOSE A CATEGORY')</h3>
                        <div class="sell-cetagory-wrapper">
                            <div class="sell-category-wrapper-list">
                                <ul class="sell-cetagory-left-list">
                                    @foreach ($categories as $item)
                                        <li>
                                            <a href="#" class="sell-cetagory-left-list-thumb-wrapper">
                                                <img src="{{ URL::asset('assets/frontend') }}//images/category/category-1.png"
                                                    alt="{{ $item->title }}">
                                                <span>{{ $item->title }}</span>
                                            </a>
                                            @if (!empty($item['subCategories']))
                                                <ul class="sell-cetagory-right-list">
                                                    @foreach ($item['subCategories'] as $sub_category)
                                                        <input type="hidden" name="category_id"
                                                            value="{{ $sub_category->id }}">
                                                        <li><a href="#"
                                                                onclick="openPage('{{ route('frontend.user.ad.form', [$item->id, $sub_category->id]) }}')">{{ $sub_category->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>

                                {{-- @if (!empty($item['subCategories']))
                                        <ul class="sell-cetagory-right-list">
                                            @foreach ($item['subCategories'] as $sub_category)
                                                <input type="hidden" name="category_id" value="{{ $sub_category->id }}"
                                                    readonly>
                                                <li><a href="#"
                                                        onclick="openPage('{{ route('frontend.user.ad.form', [$item->id, $sub_category->id]) }}')">{{ $sub_category->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif --}}
                                {{-- @endforeach --}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function openPage(page) {
            window.location.href = page
        }
    </script>
@endsection
