@php
    $advert = \App\Models\UserContact::where('message_sender_id', '=', Auth::guard('advertiser')->user()->id)
        ->orderBy('id', 'desc')
        ->first();
    $is_block = \App\Models\MessageUser::where('from', $user->id)
        ->where('to', Auth::guard('advertiser')->user()->id)
        ->orWhere('to', $user->id)
        ->where('from', Auth::guard('advertiser')->user()->id)
        ->first();
@endphp

<div class="chat-right-wrapper">

    <div class="chat-right-area-hader">
        <div class="chat-right-user-area">
            <div class="chat-right-user-thumb">
                <img src="{{ URL::asset('assets/frontend') }}/images/product-item/image.webp" alt="product">
                <div class="chat-right-user-thumb-profile">
                    <img src="{{ URL::asset('core/public/storage/user/' . $user->image) }}" alt="seller-profile">
                </div>
            </div>
            <div class="chat-right-user-content">
                <h4 class="title">{{ $user ? $user->first_name . ' ' . $user->last_name : '' }} </h4>
            </div>
        </div>
        <div class="chat-right-user-action-area">
            <button type="button" data-bs-toggle="modal" data-bs-target="#reportModal"><i
                    class="las la-flag"></i></button>
            <button type="button" class="chat-right-user-opsition-btn"><i class="las la-ellipsis-v"></i></button>

            <button type="button" class="btn btn-danger text-dark onlyDeleteMessage"
                data-recever_id="{{ $user->id }}">Delete
                Chat</button>
            <button type="button" class="btn btn-danger text-dark blockUser"
                data-recever_id="{{ $user->id }}">Block User
                Chat</button>
            <button type="button" class="chat-right-cross-btn">
                <i class="las la-times" id="deleteAllSelectedMsg"></i>
            </button>
            {{-- <button type="button" class="chat-right-cross-btn"><input type="checkbox" id="selectAll"></button> --}}
            <ul class="chat-right-user-dropdown-list">
                <li>
                    <button type="button">Delete Chat</button>
                </li>
                <li>
                    <button type="button">Block User</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="pin-product-name-area">
        <a href="product-details.html" class="d-block">
            <h4 class="pin-product-title">

                @if (isset($advert->advertisement_title))
                    <span>{{ $advert->advertisement_title ?? '' }}<span> USD
                            {{ $advert->advertisement_price ?? '' }}</span>
                @endif
            </h4>
        </a>
    </div>

    <div class="support-chat-area">
        <div class="ps-container chat-history">
            @foreach ($messages as $message)
                @if ($message->to == Auth::guard('advertiser')->user()->id)
                    <div class="media media-chat">
                        <img class="avatar" src="{{ URL::asset('core/public/storage/user/' . $user->image) }}"
                            alt="client">
                        <div class="media-body">
                            <p>{{ $message->message }}
                                <span>{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span><i
                                    class="las la-check-double"></i>
                            </p>
                        </div>
                    </div>
                @else
                    <div class="media media-chat media-chat-reverse">

                        <div class="media-body message">
                            {{-- <input type="checkbox" class="msg_checkbox_class" data-id="{{ $message->id }}"> --}}
                            {{-- <i class="fas fa-map-pin" aria-hidden="true"></i> --}}

                            <p id="msg_id">{{ $message->message }}
                                <span>{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span><i
                                    class="las la-check-double"></i>
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @if ($is_block->is_block == 0)
            <div class="chat-right-footer-wrapper">
                <ul class="chat-quick-text-list">
                    <li>
                        <a href="#0" class="btn--base active prebuildSms">Ok</a>
                    </li>
                    <li>
                        <a href="#0" class="btn--base active prebuildSms">No problem</a>
                    </li>
                </ul>
                <div class="chat-form">
                    <div class="publisher">
                        <button type="button" class="publisher-btn file-group me-3" data-bs-toggle="modal"
                            data-bs-target="#mapModal2">
                            <i class="la la-paperclip"></i>
                        </button>
                        <div class="chatbox-message-part">
                            <input class="publisher-input write_message" type="text" name="message"
                                placeholder="Write something....." autocomplete="off">
                        </div>
                        <div class="chatbox-send-part d-flex flex-wrap align-items-center">
                            <button type="button" class="clickForSendMessage"><svg width="28px" height="28px"
                                    viewBox="0 0 1024 1024" data-aut-id="icon" class="" fill-rule="evenodd">
                                    <path class="rui-4K4Y7"
                                        d="M512 0c281.6 0 512 230.4 512 512s-230.4 512-512 512-512-230.4-512-512 230.4-512 512-512zM284.444 256l93.867 256-93.867 256 568.889-256-568.889-256zM386.844 366.933l290.133 130.844h-241.778l-48.356-130.844zM435.2 526.222h241.778l-290.133 130.844 48.356-130.844z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center ">
                <p class="text-danger  text-center">You Can't Make Conversation With This Person!</p>
            </div>
        @endif

    </div>
</div>
