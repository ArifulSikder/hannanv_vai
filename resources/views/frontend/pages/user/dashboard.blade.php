@extends('frontend.layout.main')
@section('content')
    <!--~~~~~~~~~~~~~~Start Breadcrumb~~~~~~~~~~~~~~-->
    <div class="breadcrumb-section pt-20">
        <div class="container">
            <ul class="breadcrumb-list">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('user/view') }}"><i class="las la-angle-right"></i> My ADS</a>
                </li>

            </ul>
        </div>
    </div>
    <!--~~~~~~~~~~~~Start My ADS~~~~~~~~~~~~~-->
    <section class="my-ads-section pb-60 pt-30">
        <div class="container">
            <div class="product-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="category-tab" data-bs-toggle="tab" data-bs-target="#category"
                            type="button" role="tab" aria-controls="category" aria-selected="true">Ads</button>
                        <button class="nav-link" id="apps-tab" data-bs-toggle="tab" data-bs-target="#apps" type="button"
                            role="tab" aria-controls="apps" aria-selected="false">Favorites</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="category-tab">
                        <div class="my-ads-card-item-wrapper pt-30">
                            <div class="row mb-20-none">
                                @forelse($my_ads as $item)
                                    @if ($item->sub_category_count == 0)
                                        <div class="col-xxl-4 col-xl-6 col-lg-6 mb-20">
                                            <div class="my-ads-card-item">
                                                <div class="my-ads-card-wrapper">
                                                    <div class="my-ads-card-header">
                                                        <h3 class="my-ads-card-header-title">@lang('Form '): <span>
                                                                {{ diffForHumans($item->created_at) }}
                                                            </span></h3>
                                                        <div class="my-ads-card-action-btn">
                                                            <button type="button" data-bs-toggle="dropdown"
                                                                data-display="static" aria-haspopup="true"
                                                                aria-expanded="false" class="opsition-btn">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </button>
                                                            <div
                                                                class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                                                <a href="{{ route('frontend.user.general.ad.manage', $item->id) }}"
                                                                    class="dropdown-menu__item d-flex align-items-center px-3 py-2"><span
                                                                        class="dropdown-menu__caption">@lang('Edit now')</span>
                                                                </a>
                                                                <form
                                                                    action="{{ route('frontend.user.delete.ad', $item->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                                        <span
                                                                            class="dropdown-menu__caption">@lang('Remove')</span>
                                                                    </button>
                                                                </form>
                                                                <a href="#"
                                                                    class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                                    <span
                                                                        class="dropdown-menu__caption">@lang('Sell faster')</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-ads-thumb-main-wrapper">
                                                        <div class="my-ads-thumb-wrapper">
                                                            <div class="thumb">
                                                                <img src="{{ URL::asset('core/public/storage/image/' . $item->image) }}"
                                                                    alt="product">
                                                            </div>
                                                            <div class="title-area">
                                                                <h3>{{ $item->title }}</h3>
                                                                @if (!empty($item->details_informations) && $item->details_informations != null)
                                                                    @foreach (json_decode($item->details_informations) as $key => $details_info)
                                                                        <span>{{ str_replace('_', ' ', ucfirst($key)) }} :
                                                                            {!! $details_info !!}</span> <br>
                                                                    @endforeach
                                                                @else
                                                                    {{ $item->description }}
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="badge-area">
                                                            <span class="badge badge--warning">
                                                                @if ($item->status == 0)
                                                                    Pending
                                                                @elseif($item->status == 1)
                                                                    Published
                                                                @else
                                                                    Sold
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <ul class="my-ads-status-list">
                                                        <li><i class="las la-eye"></i> Views: {{ $item->view_count }}</li>
                                                        <li><i class="las la-phone"></i> Tel: 0</li>
                                                        <li><i class="las la-heart"></i> Likes:
                                                            {{ $item->favourites_count }}
                                                        </li>
                                                        <li><i class="las la-comment"></i> Chats: {{ $item->ad_message_count }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-xxl-4 col-xl-6 col-lg-6 mb-20">
                                            <div class="my-ads-card-item">
                                                <div class="my-ads-card-wrapper">
                                                    <div class="my-ads-card-header">
                                                        <h3 class="my-ads-card-header-title">@lang('Form '): <span>
                                                                {{ diffForHumans($item->created_at) }}
                                                            </span></h3>
                                                        <div class="my-ads-card-action-btn">
                                                            <button type="button" data-bs-toggle="dropdown"
                                                                data-display="static" aria-haspopup="true"
                                                                aria-expanded="false" class="opsition-btn">
                                                                <i class="fas fa-ellipsis-h"></i>
                                                            </button>
                                                            <div
                                                                class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                                                <a href="{{ route('frontend.user.edit.ad', $item->id) }}"
                                                                    class="dropdown-menu__item d-flex align-items-center px-3 py-2"><span
                                                                        class="dropdown-menu__caption">@lang('Edit now')</span>
                                                                </a>
                                                                <form
                                                                    action="{{ route('frontend.user.delete.ad', $item->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                                        <span
                                                                            class="dropdown-menu__caption">@lang('Remove')</span>
                                                                    </button>
                                                                </form>



                                                                <a href="#"
                                                                    class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                                    <span
                                                                        class="dropdown-menu__caption">@lang('Sell faster')</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-ads-thumb-main-wrapper">
                                                        <div class="my-ads-thumb-wrapper">
                                                            <div class="thumb">
                                                                <img src="{{ URL::asset('core/public/storage/image/' . $item->image) }}"
                                                                    alt="product">
                                                            </div>
                                                            <div class="title-area">
                                                                <h3>{{ $item->title }}</h3>
                                                                @if (!empty($item->details_informations) && $item->details_informations != null)
                                                                    @foreach (json_decode($item->details_informations) as $key => $details_info)
                                                                        <span>{{ str_replace('_', ' ', ucfirst($key)) }} :
                                                                            {!! $details_info !!}</span> <br>
                                                                    @endforeach
                                                                @else
                                                                    {{ $item->description }}
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="badge-area">
                                                            <span class="badge badge--warning">
                                                                @if ($item->status == 0)
                                                                    Pending
                                                                @elseif($item->status == 1)
                                                                    Published
                                                                @else
                                                                    Sold
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <ul class="my-ads-status-list">
                                                        <li><i class="las la-eye"></i> Views: {{ $item->view_count }}</li>
                                                        <li><i class="las la-phone"></i> Tel: 0</li>
                                                        <li><i class="las la-heart"></i> Likes:
                                                            {{ $item->favourites_count }}
                                                        </li>
                                                        <li><i class="las la-comment"></i> Chats: {{  $item->ad_message_count }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    @lang('No Ad Published')
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="apps" role="tabpanel" aria-labelledby="apps-tab">
                        <div class="my-ads-card-item-wrapper pt-30">
                            <div class="row mb-20-none">
                                @forelse ($favourite_ads as $item)
                                    <div class="col-xxl-4 col-xl-6 col-lg-6 mb-20">
                                        <div class="my-ads-card-item">
                                            <div class="my-ads-card-wrapper">
                                                <div class="my-ads-card-header">
                                                    <h3 class="my-ads-card-header-title">Form: <span>18 Aug 22</span></h3>
                                                    <div class="my-ads-card-action-btn">
                                                        <button type="button" data-bs-toggle="dropdown"
                                                            data-display="static" aria-haspopup="true"
                                                            aria-expanded="false" class="opsition-btn">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
                                                            <a href="#"
                                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2"><span
                                                                    class="dropdown-menu__caption">Edit now</span>
                                                            </a>
                                                            <a href="#"
                                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                                <span class="dropdown-menu__caption">Remove</span>
                                                            </a>
                                                            <a href="#"
                                                                class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                                                                <span class="dropdown-menu__caption">Sell faster</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($item->ad)
                                                <div class="my-ads-thumb-main-wrapper">
                                                    <div class="my-ads-thumb-wrapper">
                                                        <div class="thumb">
                                                            <img src="{{ URL::asset('core/public/storage/image/' . $item->ad->image) }}"
                                                                alt="product">
                                                        </div>
                                                        <div class="title-area">
                                                            <h3>{{ $item->ad->title }}</h3>
                                                            <span>
                                                                @if (!empty($item->ad->details_informations) && $item->ad->details_informations != null)
                                                                    @foreach (json_decode($item->ad->details_informations) as $key => $details_info)
                                                                        <span>{{ str_replace('_', ' ', ucfirst($key)) }} :
                                                                            {!! $details_info !!}</span> <br>
                                                                    @endforeach
                                                                @else
                                                                    {{ $item->description }}
                                                                @endif

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="badge-area">
                                                        <span class="badge badge--warning">
                                                            @if ($item->ad->status == 0)
                                                                Pending
                                                            @elseif($item->ad->status == 1)
                                                                Published
                                                            @else
                                                                Sold
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <ul class="my-ads-status-list">
                                                    <li><i class="las la-eye"></i> Views: {{ $item->ad->view_count }}</li>
                                                    <li><i class="las la-heart"></i> Likes: {{ $item->favourites_count }}
                                                    <li><i class="las la-phone"></i> Tel: 0</li>
                                                    <li><i class="las la-comment"></i> Chats: {{  $item->ad_message_count }}</li>
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    @lang('No favourite ads')
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript"></script>
@endsection
