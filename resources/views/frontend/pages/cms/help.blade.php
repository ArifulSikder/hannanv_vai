@extends('frontend.layout.main')
@push('custom_css')
    <style>

    </style>
@endpush
@section('content')
    <section class="help-btn-section pt-60 mb-30">
        <div class="container">
            <div class="row mb-30-none">
                @forelse ($cms as $page)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-30">
                        <div class="help-btn-item">
                            <a href="{{ $general->domain_name }}/{{ $page->slug }}"
                                class="btn--base active w-100">{{ $page->title }}</a>
                        </div>
                    </div>
                @empty
                    @lang('No Pages found')
                @endforelse
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
