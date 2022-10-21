<?php

namespace App\Http\Controllers\Front;

use App\Models\City;
use App\Models\Rating;
use App\Models\CMSPage;
use App\Models\Message;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\UserQuery;
use App\Models\Advertiser;
use App\Models\UserContact;
use Illuminate\Support\Str;
use App\Events\MessageEvent;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Helpers\Generals;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MessageUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {
        $data['page_file_name'] = 'home_page';
        $data['main_category'] = Category::with('ads', 'subCategories')->has('ads')->parent()->active()->orderBy('id', 'desc')->paginate(getPaginate());
        $data['sub_category'] =  Category::where(function ($query) {
            $query->where('parent_id', '!=', 0)->orWhereNull('parent_id');
        })->paginate(getPaginate());
        $data['ads'] = Advertisement::with('city')->get();
        $data['featured_ads'] = Advertisement::featured()->with(
            [
                'city' => function ($query) {
                    $query->select('id', 'title')->where('status', 1);
                },
                'images'
            ]
        )->where('created_at', '<=', Carbon::now())
            ->where('feature_expire_date', '>=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();
        return view('frontend.index', $data);
    }

    public function cms_page(Request $request)
    {
        $domain_name = DB::table('general_settings')->pluck('domain_name')->first();
        $currentRoute = url()->current();
        $currentRoute = Str::replace('http://localhost/haraj_final/', '', $currentRoute);
        // $currentRoute = Str::replace($domain_name, '', $currentRoute);
        $cmsRoutes = CMSPage::where('status', 1)->get()->pluck('slug')->toArray();
        if (in_array($currentRoute, $cmsRoutes)) {
            $cmsPageDetails = CMSPage::where('slug', $currentRoute)->first()->toArray();
            $related_page = CMSPage::where('position', '!=', 1)->inRandomOrder()->take(4)->get();
            return view('frontend.pages.cms.index', compact('cmsPageDetails', 'related_page'));
        } else {
            abort(404);
        }
    }

    public function categoryWiseAds($id)
    {
        $data['ads'] = Advertisement::with('category', 'city')->where('category_id', $id)->orderBy('id', 'desc')->paginate(getPaginate());
        $data['ad_under_child_category'] = Advertisement::with('category', 'city')->where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(getPaginate());
        return view('frontend.pages.public_ads.catgory_ad', $data);
    }

    public function childCategoryAds($id)
    {
        $data['ads'] = Advertisement::with('category', 'city')->where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(getPaginate());
        return view('frontend.pages.public_ads.child_catgory_ad', $data);
    }

    public function cityWiseAds($id)
    {
        $data['ads'] = Advertisement::with('city')->where('city_id', $id)->orderBy('id', 'desc')->paginate(getPaginate());
        return view('frontend.pages.public_ads.city_ad', $data);
    }

    public function details($slug, $id)
    {
        $details = Advertisement::with('advertiser', 'city', 'category', 'images')->where('slug', $slug)->first();
        if (isset($details)) {
            DB::table('advertisements')->where('id', $id)->increment('view_count');
        }
        $related_products = Advertisement::with('category')
            ->where('category_id', $details->category_id)
            ->where('slug', '!=', $details->slug)
            ->inRandomOrder()->take(4)->get();
        $user_rating = Rating::where('advertiser_id', $details->advertiser_id)->select('rating')->get();
        return view('frontend.pages.public_ads.details', compact('details', 'related_products', 'user_rating'));
    }


    public function allAds(Request $request)
    {
        $query = Advertisement::query()->with('category', 'city', 'favourites', 'advertiser');
        if ($request->ajax()) {
            $all_ads =  $query->where('category_id', $request->category)
                ->orWhere('city_id', $request->city_id);

            if (isset($request->sort) && !empty($request->sort)) {
                if ($request->sort == "latest_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'favourites', 'advertiser')->orderBy('id', 'DESC');
                } else if ($request->sort == "lowest_price_wise_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'favourites', 'advertiser')->orderBy('price', 'ASC');
                } else if ($request->sort == "highest_price_wise_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'favourites', 'advertiser')->orderBy('price', 'DESC');
                } else if ($request->sort == "oldest_ads") {
                    $all_ads = Advertisement::with('category', 'city', 'favourites', 'advertiser')->orderBy('id', 'ASC');
                }
            }

            $all_ads = $all_ads->get();
            return response()->json(['all_ads' => $all_ads]);
        }
        $all_ads = $query->paginate(getPaginate());
        $all_city = City::with('ads')->select('id', 'slug', 'title')->orderBy('id', 'desc')->get();
        return view('frontend.pages.public_ads.all_ads', compact('all_ads', 'all_city'));
    }

    public function search(Request $request)
    {
        if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
            $search_product = $_REQUEST['search'];
            $categoryDetails['catDetails']['title'] = $search_product;
            $categoryDetails['catDetails']['description'] = "Search result for " . $search_product;

            $all_ads = Advertisement::join('cities', 'cities.id', '=', 'advertisements.city_id')->join('categories', 'categories.id', '=', 'advertisements.category_id')
                ->where(function ($query) use ($search_product) {
                    $query->where('advertisements.title', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.price', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.brand', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.color', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.condition', 'like', '%' . $search_product . '%')
                        ->orWhere('advertisements.authenticity', 'like', '%' . $search_product . '%')
                        ->orWhere('categories.title', 'like', '%' . $search_product . '%')
                        ->orWhere('cities.title', 'like', '%' . $search_product . '%');
                })
                ->select('advertisements.*')->get();
            // dd($all_ads);
            $page_name = "search_result";
            return view('frontend.pages.public_ads.listing', compact('all_ads', 'categoryDetails', 'page_name'));
        }
    }

    //Auto complete
    public function autoSearch(Request $request)
    {
        $query = $request->get('term', '');
        $ads_data = Advertisement::where('title', 'LIKE', '%' . $query . '%')->select('id', 'title')->get();
        $data = [];
        foreach ($ads_data as $item) {
            $data[] = [
                'value' => $item->title,
                'id' => $item->id
            ];
        }
        if (count($data)) {
            return $data;
        } else {
            return ['value' => 'No result found', 'id' => ''];
        }
    }

    public function registerUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $userCount = Advertiser::where('email', $data['email'])->count();
            if ($userCount > 0) {
                $notify[] = ['error', 'User already exist!'];
                return back()->withNotify($notify);
            } else {
                $user = new Advertiser();
                $user->first_name = $data['first_name'];
                $user->last_name = $data['last_name'];
                $user->username = $data['username'];
                $user->mobile_no = $data['mobile_no'];
                $user->email = $data['email'];
                $user->registration_code = random_int(111111, 999999);
                $user->password = Hash::make($data['password']);
                $user->save();
                try {
                    sendEmail($user, 'EVER_CODE', [
                        'code' => $user->registration_code
                    ]);
                } catch (\Exception $th) {
                    throw $th;
                }
                Auth::guard('advertiser')->logout();
                $notify[] = ['success', 'Please confirm your email to active your account'];
                return redirect()->route('frontend.verify')->withNotify($notify);
            }
        }
        return view('frontend.pages.user.register');
    }
    public function verify(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $user = DB::table('advertisers')->where('registration_code', $data['registration_code'])->update(['status' => 1]);
            if ($user == null) {
                $notify[] = ['error', 'Code does not exist'];
                return redirect()->back()->withNotify($notify);
            }
            $notify[] = ['success', 'Congratulations you are now verified'];
            return redirect()->route('frontend.login')->withNotify($notify);
        }
        return view('frontend.pages.user.verify');
    }

    function loadMore(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $data = Advertisement::where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(4)->get();
            } else {
                $data = Advertisement::orderBy('id', 'DESC')->limit(4)->get();
            }
            $output = '';
            $last_id = '';
            if (!$data->isEmpty()) {
                foreach ($data as $row) {
                    $output .= '
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-20">
                        <div class="product-single-item">
                        <a class="product-wishlist" href="' . url('user/favourite/' . $row->id) . '" title="wishlist"
                        advertisement_id="' . $row->id . '" id="advertisement_{{ $item->id }}"
                        href="javascript:void(0)">
                        <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" class="sc-AxjAm dJbVhz"><path d="M16.224 5c-1.504 0-2.89.676-3.802 1.854L12 7.398l-.421-.544A4.772 4.772 0 0 0 7.776 5C5.143 5 3 7.106 3 9.695c0 5.282 6.47 11.125 9.011 11.125 2.542 0 8.99-5.445 8.99-11.125C21 7.105 18.857 5 16.223 5z"></path></svg>
                        </span>
                        </a>
                        <a href="' . url('ads/details/' . $row->slug . '/' . $row->id) . '">
                                <div class="thumb">
                                    <img src="' . asset('core/public/storage/image/' . $row->image) . '" alt="AdImage">
                                </div>
                                <div class="content">
                                    <span class="sub-title">' . $row->city->title . '</span>
                                    <h5 class="title">' . $row->title . '</h5>
                                    <span class="inner-sub-title">' . $row->category->title . '</span>
                                    <h5 class="inner-title">' . $row->price . 'TL</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    ';
                    $last_id = $row->id;
                }
                $output .= '
                <div id="load_more" class="load-more-btn text-center mt-60">
                    <button type="button" name="load_more_button" class="btn--base" data-id="' . $last_id . '" id="load_more_button">Load More</button>
                </div>
                ';
            } else {
                $output .= '
                <div id="load_more" class="load-more-btn text-center mt-60">
                    <button type="button" name="load_more_button" class="btn--base">No More Data Found</button>
                </div>
                ';
            }
            echo $output;
        }
    }
    public function help()
    {
        $cms = CMSPage::where('position', 4)->get();
        return view('frontend.pages.cms.help', compact('cms'));
    }
    public function contact(Request $request)
    {
        $data['title'] = "Contact";
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'user_message' => 'required',
            ];
            //Validation message
            $customMessage = [
                'name.required' => 'Name is required',
                'email.email' => 'Email is required',
                'subject.required' => 'Subject is required',
                'user_message.required' => 'Message is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);
            // Check validation failure
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $query = new UserQuery();
            $query->name = $data['name'];
            $query->email = $data['email'];
            $query->subject = $data['subject'];
            $query->attachment = Generals::update('user_mail_attachment/', $query->image, 'png', $request->file('image'));
            $query->user_message = $data['user_message'];
            $query->save();
            $notify[] = ['success', 'Thanks for your enquiry. We will get back to you soon'];
            return redirect()->back()->withNotify($notify);
        }
        return view('frontend.pages.cms.contact');
    }
    public function detailsSendMessage(Request $request)
    {
        if (isset(Auth::guard('advertiser')->user()->id)) {
            $from = Auth::guard('advertiser')->user()->id;
            $to = $request->recever_id;

            $is_message_before = MessageUser::where('from',  $from)->where('to', $to)
                ->orWhere('from',  $to)->where('to', $from)->first();
            if ($is_message_before == null) {
                MessageUser::create([
                    'from' =>  $from,
                    'to' =>  $to,
                    'is_block' => 0,
                    'date' => Carbon::now(),
                ]);
            } else {
                $is_message_before->update([
                    'date' => Carbon::now(),
                ]);

                MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 0, 'is_deleted_to' => 0]);

                MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 0, 'is_deleted_from' => 0]);
            }

            $data = new Message();
            $data->from = $from;
            $data->to = $request->recever_id;

            $data->message = $request->message;
            $data->is_read = 0;

            if ($request->advertisement_id) {
                $msg_prd = new UserContact();
                $msg_prd->message_sender_id = Auth::guard('advertiser')->user()->id;
                $msg_prd->advertiser_id = $request->advertiser_id;
                $msg_prd->advertisement_id = $request->advertisement_id ?? null;
                $msg_prd->advertisement_title = $request->advertisement_title;
                $msg_prd->advertisement_price = $request->advertisement_price;
                $msg_prd->save();
            }
            $data->save();
            event(new MessageEvent($from, $to));
            $notify[] = ['success', 'Thanks for your enquiry. We will get back to you soon'];
            return redirect()->back()->withNotify($notify);
        } else {
            $notify[] = ['warning', 'Please login'];
            return redirect()->back()->withNotify($notify);
        }
    }
    public function sendMessage(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;
        $to = $request->recever_id;

        $is_message_before = MessageUser::where('from',  $from)->where('to', $to)
            ->orWhere('from',  $to)->where('to', $from)->first();
        if ($is_message_before == null) {
            MessageUser::create([
                'from' =>  $from,
                'to' =>  $to,
                'is_block' => 0,
                'date' => Carbon::now(),
            ]);
        } else {
            $is_message_before->update([
                'date' => Carbon::now(),
            ]);

            MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 0, 'is_deleted_to' => 0]);

            MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 0, 'is_deleted_from' => 0]);
        }

        $data = new Message();
        $data->from = $from;
        $data->to = $request->recever_id;
        $data->message = $request->message;
        $data->is_read = 0;
        $data->save();
        event(new MessageEvent($from, $to));
        return ['success' => true];
    }

    public function getMessage(int $user_id)
    {
        $my_id = Auth::guard('advertiser')->user()->id;
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        $messages = Message::where('from', $user_id)->where('to', $my_id)->where('deleted_to', 0)
            ->orWhere('from', $my_id)->where('to', $user_id)->where('deleted_from', 0)->get();

        $user = Advertiser::findOrFail($user_id);
        $myId = Advertiser::findOrFail($my_id);

        return view('frontend.pages.cms.messages_index', ['messages' => $messages, 'user' => $user, 'myId' => $myId]);
    }

    //delete conversation with message user
    public function deleteConversationAjax(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_deleted_from' => 1]);

        MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_deleted_to' => 1]);

        Message::where('from', $from)->where('to', $request->recever_id)->update(['deleted_from' => 1]);

        Message::where('to',  $from)->where('from', $request->recever_id)->update(['deleted_to' => 1]);

        return response()->json([
            'status' => 1
        ]);
    }

    // delete only conversation with
    public function deleteOnlyConversationAjax(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        Message::where('from', $from)->where('to', $request->recever_id)->update(['deleted_from' => 1]);

        Message::where('to',  $from)->where('from', $request->recever_id)->update(['deleted_to' => 1]);

        return response()->json([
            'status' => 1
        ]);
    }

    //block user
    public function blockUser(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_block' => 1]);

        MessageUser::where('to',  $from)->where('from', $request->recever_id)->update(['is_block' => 1]);

        return response()->json([
            'status' => 1
        ]);
    }

    //mark as important

    public function markAsImportant(Request $request)
    {
        $from = Auth::guard('advertiser')->user()->id;

        MessageUser::where('from', $from)->where('to', $request->recever_id)->update(['is_important_from' => 1]);

        MessageUser::where('to', $from)->where('from', $request->recever_id)->update(['is_important_to' => 1]);


        return response()->json([
            'status' => 1
        ]);
    }




    public function rating(Request $request)
    {
        if (!empty(Auth::guard('advertiser')->user()->id)) {
            $data = $request->all();
            $review = new Rating();
            $review->advertiser_id = Auth::guard('advertiser')->user()->id;
            $review->rating     = $data['input-9'];
            $review->save();
            $notify[] = ['success', 'Thanks for your rating'];
            return redirect()->back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Please login'];
            return redirect()->back()->withNotify($notify);
        }
    }

    public function pageVote(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if ($data['increment_value'] == 1) {
                try {
                    CMSPage::find($data['page_id'])->increment('vote_count');
                    return  response()->json(['status' => 'success']);
                } catch (\Exception $th) {
                    dd($th);
                }
            }
        }
    }

    public function deleteConversation($user_id)
    {
        dd($user_id);
    }

    public function deleteAllChat()
    {
        dd('hi');
    }
}
