@extends('admin.layout.master')
@section('title')
    Currency
@endsection
@section('page-name')
    Currency
@endsection
@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboards</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="#">
                <span class="active-path g-color">Currency</span>
            </a>
        </div>
        <div class="view-prodact">
            <a href="{{ route('admin.currency.manage') }}">
                <i class="las la-plus"></i>
                <span>Add Currency</span>
            </a>
            <a href="" data-bs-toggle="modal" data-bs-target="#currencyApi">
                <i class="las la-key"></i>
                <span>@lang('Currency Api Key')</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-wrapper table-responsive">
                <table class="custom-table small">
                    <thead>
                        <tr>
                            <th scope="col">@lang('Currency Full Name/Code')</th>
                            <th scope="col">@lang('Currency Symbol')</th>
                            <th scope="col">@lang('Currency')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($currencies as $item)
                            <tr class="{{ $item->is_default == 1 ? 'bg--active' : '' }}">
                                <td data-label="@lang('Currency Full Name/Code')">
                                    <span class="font-weight-bold">{{ $item->currency_fullname }}</span>
                                    <br>
                                    <span class="small">
                                        {{ $item->currency_code }}
                                    </span>
                                </td>

                                <td data-label="@lang('Currency')"><span
                                        class="font-weight-bold">{{ $item->currency_symbol }}</span></td>
                                <td data-label="@lang('Currency Type')">
                                    @if ($item->currency_type == 1)
                                        <span class="font-weight-bold text--info">@lang('Fiat Currency')</span>
                                    @else
                                        <span class="font-weight-bold text--warning">@lang('Crypto Currency')</span>
                                    @endif
                                    <br>1 {{ $item->currency_code }} = {{ number_format($item->rate, 8) }}
                                    {{ defaultCurrency()  }}

                                </td>

                                <td data-label="@lang('Status')">
                                    @if ($item->status == 1)
                                        <a title="Change" item_id="{{ $item->id }}"
                                            class="text--small badge font-weight-normal badge--success item_status"
                                            id="item_{{ $item->id }}" href="javascript:void(0)"> @lang('Active')
                                        </a>
                                    @else
                                        <a title="Change" item_id="{{ $item->id }}"
                                            class="text--small badge font-weight-normal badge--warning item_status"
                                            id="item_{{ $item->id }}" href="javascript:void(0)">@lang('Inactice')
                                        </a>
                                    @endif
                                </td>
                                <td data-label="@lang('Action')">
                                    <a title="@lang('Edit')" class="btn btn-primary"
                                        href="{{ route('admin.currency.manage', $item->id) }}">
                                        <i class="las la-edit text--shadow"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ $emptyMessage }}</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table><!-- table end -->
            </div>
        </div>
        <div class="card-footer py-4">
            {{ paginateLinks($currencies) }}
        </div>
    </div><!-- card end -->


    <!--Currency Api Modal -->
    <div class="modal fade" id="currencyApi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('admin.currency.api.update') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg--primary">
                        <h5 class="modal-title text-white">@lang('Currency Api Key')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-bold text--info">@lang('Fiat Currency Rate Api Key')</label>
                            ( <small>@lang('For the api key please visit :')
                                <a target="_blank" class="text--info"
                                    href="https://currencylayer.com/">@lang('Currency Layer')</a>
                            </small> )
                            <input class="form-control form--control" type="text" name="fiat_api_key"
                                placeholder="@lang('Fiat Currency Rate Api Key')" required value="{{ $general->fiat_currency_api }}">
                        </div>


                        <div class="form-group mb-3">
                            <small class="font-weight-bold">@lang('Set up cron job for update fiat price rate :')</small>
                            <small class="text--danger">{{ route('frontend.cron.fiat.rate') }}</small>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="font-weight-bold text--warning">@lang('Crypto Currency Rate Api Key')</label>
                            ( <small>@lang('For the api key please visit :')
                                <a target="_blank" class="text--info"
                                    href="https://coinmarketcap.com/">@lang('CoinMarketCap')</a>
                            </small> )
                            <input class="form-control form--control" type="text" name="crypto_api_key"
                                placeholder="@lang('Crypto Currency Rate Api Key')" required value="{{ $general->crypto_currency_api }}">
                        </div>

                        <div class="form-group">
                            <small class="font-weight-bold">@lang('Set up cron job for update crypto price rate :')</small>
                            <small class="text--danger">{{ route('frontend.cron.crypto.rate') }}</small>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-success">@lang('Update')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



@push('breadcrumb-plugins')
    <form action="" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control form--control" placeholder="@lang('Currency Code, Full name')"
                value="{{ $search ?? '' }}" autocomplete="off">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".item_status", function() {
            var status = $(this).text();
            var item_id = $(this).attr("item_id");
            $.ajax({
                type: 'post',
                url: '{{ route('admin.currency.status') }}',
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
