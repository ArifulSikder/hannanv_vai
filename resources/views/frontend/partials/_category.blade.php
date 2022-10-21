<section class="category-section pt-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 text-center">
                <div class="section-header">
                    <h2 class="section-title">Buy and sell secondhand and find great deals!</h2>
                </div>
            </div>
        </div>
        <div class="category-main-wrapper">
            <ul class="category-wrapper">
                @foreach ($main_category as $item)
                    <li>
                        <div class="category-item">
                            <a href="{{ route('frontend.ads.categorywise', $item->id) }}">
                                <div class="icon"
                                    style="background-color:{{ $item ? $item->bg_color : '' }}!important";>
                                    {!! $item->icon !!}
                                </div>
                                <div class="content">
                                    <span>{!! $item->title !!}</span>
                                </div>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
