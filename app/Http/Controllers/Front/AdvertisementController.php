<?php

namespace App\Http\Controllers\Front;

use App\Models\AdImage;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Helpers\Generals;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    public function dashboard()
    {

        $advertiser = Auth::guard('advertiser')->user()->id;
        $data['my_ads'] = Advertisement::withCount('favourites', 'sub_category', 'ad_message')->where('advertiser_id', $advertiser)->get();
        // dd($data['my_ads']);
        $data['favourite_ads'] = Favourite::with(['ad'])->where('advertiser_id', $advertiser)->get();
        return view('frontend.pages.user.dashboard', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postAd()
    {
        $data['categories'] = Category::withCount('subCategories')->orderBy('id', 'DESC')->where('parent_id', 0)->active()->get();
        return view('frontend.pages.ad.category', $data);
    }
    public function postAdForm(Request $request, $category_id = null, $sub_category_id = null)
    {
        $category = DB::table('categories')->where('id', $category_id)->first();
        $sub_category = DB::table('categories')->where('id', $sub_category_id)->first();
        $title = "New ad";
        $buttonText = "Save";
        return view('frontend.pages.forms.default', compact('category', 'sub_category', 'buttonText', 'title'));
    }

    public function adStore(Request $request)
    {
        // dd($request->all());
        $adv = new Advertisement();
        try {
            if ($request->isMethod('POST')) {
                $data = $request->all();
                $rules = [
                    'title' => 'required',
                    'description' => 'required',
                    'condition' => 'required',
                    'price' => 'required',
                    'image' => 'required'

                ];
                $validationMessages = [
                    'title.required' => 'The name field can not be blank',
                    'description.required' => 'Description is required',
                    'condition.required' => 'Condition is required',
                    'image.required' => 'Thumbnail is required',
                    'price.required' => 'Price is required'
                ];
                $this->validate($request, $rules, $validationMessages);
                $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
                $adv->category_id = $data['category_id'];
                $adv->sub_category_id = $data['sub_category_id'];
                $adv->type_id = 0;
                if (Auth::guard('advertiser')->user()->city_id == null) {
                    $notify[] = ['warning', 'Please update your profile and select city!!'];
                    return redirect()->back()->withNotify($notify);
                }
                $adv->city_id = Auth::guard('advertiser')->user()->city_id;
                $adv->title = $data['title'];
                $adv->price = $data['price'];
                $adv->status = 1;
                $adv->description = $data['description'];

                if ($data['category_type'] == "mobiles") {
                    $adv->details_informations = json_encode([
                        'NETWORK' => $data['NETWORK'] ? $data['NETWORK'] : null,
                        'Display' => $data['Display'] ? $data['Display'] : null,
                        'Memory' => $data['Memory'] ? $data['Memory'] : null,
                        'Battery' => $data['Battery'] ? $data['Battery'] : null
                    ]);
                }
                if ($data['category_type'] == "electronics") {
                    $adv->details_informations = json_encode([
                        'model' => $data['model'] ? $data['model'] : null,
                    ]);
                }

                if ($data['category_type'] == "vehicles") {
                    $adv->details_informations = json_encode([
                        'transmission' => $data['transmission'] ? $data['transmission'] : null,
                        'body_type' => $data['body_type'] ? $data['body_type'] : null,
                        'edition' => $data['edition'] ? $data['edition'] : null,
                        'year_of_manufacture' => $data['year_of_manufacture'] ? $data['year_of_manufacture'] : null,
                        'run_km' => $data['run_km'] ? $data['run_km'] : null,
                        'engine_cc' => $data['engine_cc'] ? $data['engine_cc'] : null,
                        'year_decade' => $data['year_decade'] ? $data['year_decade'] : null,
                        'gear' => $data['gear'] ? $data['gear'] : null,
                        'traction' => $data['traction'] ? $data['traction'] : null,
                    ]);
                    $adv->fuel_type = json_encode($data['fuel_type'] ? $data['fuel_type'] : null);
                }
                $adv->condition = $data['condition'];
                if ($request->authenticity) {
                    $adv->authenticity = $data['authenticity'] ? $data['authenticity'] : null;
                }
                if ($request->edition) {
                    $adv->edition = $data['edition'] ? $data['edition'] : null;
                }

                $adv->location_embeded_map = $data['location_embeded_map'] ? $data['location_embeded_map'] : null;
                $adv->brand = $data['brand'] ? $data['brand'] : null;
                if ($request->color) {
                    $adv->color = $data['color'] ? $data['color'] : null;
                }
                $adv->image = Generals::upload('image/', 'png', $request->file('image'));

                $adv->save();

                $lastInsertedAdId = DB::getPdo()->lastInsertId();
                if ($request->has('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . rand(100, 100000) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('advertisement_images'), $imageName);
                        AdImage::create([
                            'advertisement_id' => $lastInsertedAdId,
                            'images' => $imageName
                        ]);
                    }
                }
                $request->session()->put('advertisement_id', $lastInsertedAdId);
                $notify[] = ['success', 'Ad Posted Successfully!!'];
                return redirect()->route('frontend.user.sellFaster')->withNotify($notify);
            }
        } catch (\Exception $th) {
            dd($th);
            info($th);
        }
        return redirect()->back();
    }

    public function adUpdate(Request $request, $id)
    {
        $adv = Advertisement::find($id);
        try {
            if ($request->isMethod('POST')) {
                $data = $request->all();
                $rules = [
                    'title' => 'required',
                    'description' => 'required',
                    'condition' => 'required',
                    'price' => 'required',

                ];
                $validationMessages = [
                    'title.required' => 'The name field can not be blank',
                    'description.required' => 'Description is required',
                    'condition.required' => 'Condition is required',
                    'price.required' => 'Price is required'
                ];
                $this->validate($request, $rules, $validationMessages);
                $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
                $adv->category_id = $data['category_id'];
                $adv->sub_category_id = $data['sub_category_id'];
                $adv->type_id = 0;
                $adv->city_id = Auth::guard('advertiser')->user()->city_id;
                $adv->title = $data['title'];
                $adv->price = $data['price'];
                $adv->status = 1;
                $adv->description = $data['description'];

                $adv->details_informations = json_encode([
                    'NETWORK' => $data['NETWORK'],
                    'Display' => $data['Display'],
                    'Memory' => $data['Memory'],
                    'Battery' => $data['Battery']
                ]);

                $adv->condition = $data['condition'];
                $adv->authenticity = $data['authenticity'];
                $adv->edition = $data['edition'] ? $data['edition'] : null;
                $adv->location_embeded_map = $data['location_embeded_map'] ? $data['location_embeded_map'] : null;
                $adv->brand = $data['brand'] ? $data['brand'] : null;
                $adv->color = $data['color'] ? $data['color'] : null;
                $adv->image = Generals::update('image/', $adv->image, 'png', $request->file('image'));
                $adv->save();

                $lastInsertedAdId = DB::getPdo()->lastInsertId();
                if ($request->has('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . rand(100, 100000) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('advertisement_images'), $imageName);
                        AdImage::create([
                            'advertisement_id' => $lastInsertedAdId,
                            'images' => $imageName
                        ]);
                    }
                } else {
                    $imageName = $adv->images;
                }
                $notify[] = ['success', 'Ad Updated successfully!!'];
                return redirect()->back()->withNotify($notify);
            }
        } catch (\Exception $th) {
            info($th);
        }
        return redirect()->back();
    }
    public function manageGeneralAd(Request $request, $id = null)
    {
        if ($id == "") {
            // Add Bank
            $adv = new Advertisement();
            $title = "New Ad";
            $buttonText = "Save";
            $notify[] = ['success', 'Ad saved successfully!!'];
        } else {
            // Update Coupon Code
            $adv = Advertisement::findOrFail($id);
            $title = "Update Ad";
            $buttonText = "Update";
            $notify[] = ['success', 'Ad updated successfully!!'];
        }
        //exit();
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //Validation rules
            $rules = [
                'title' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required'
            ];

            //Validation message
            $customMessage = [
                'title.required' => 'Title is required',
                'price.required' => 'Price is required',
                'description.required' => 'Description is required',
                'image.required' => 'Image is required'
            ];
            $this->validate($request, $rules, $customMessage);

            $adv->image = Generals::update('image/', $adv->image, 'png', $request->file('image'));
            $adv->advertiser_id = Auth::guard('advertiser')->user()->id;
            $adv->category_id = $data['category_id'];
            $adv->city_id = Auth::guard('advertiser')->user()->city_id;
            $adv->title = $data['title'];
            $adv->price = $data['price'];
            $adv->condition = $data['condition'];
            $adv->status = 1;
            $adv->type_id = 0;
            $adv->description = $data['description'];
            $adv->location_embeded_map = $data['location_embeded_map'];
            $adv->save();
            $lastInsertedAdId = DB::getPdo()->lastInsertId();
            $request->session()->put('advertisement_id', $lastInsertedAdId);
            return redirect()->route('frontend.user.sellFaster')->withNotify($notify);

        }
        $category = DB::table('categories')->where('category_type', '=', 'general')->first();
        return view('frontend.pages.user.manage_general_ad', compact('category', 'buttonText', 'adv'));
    }

    public function removeImage($id)
    {
        $ad_image =  Advertisement::select('image')->where('id', $id)->first();
        $small_image_path  = 'core/public/storage/image/';
        if (file_exists($small_image_path . $ad_image->image)) {
            unlink($small_image_path . $ad_image->image);
        }
        $notify[] = ['success', 'Image deleted successfully!!'];
        return redirect()->back()->withNotify($notify);
    }

    public function addToFavourite(Request $request, $id)
    {
        if (!Auth::guard('advertiser')->check()) {
            return redirect()->back()->with('error', 'Please login');
        } elseif (Favourite::where('advertiser_id', Auth::guard('advertiser')->user()->id)->where('advertisement_id', $id)->exists()) {
            Favourite::where('advertiser_id', Auth::guard('advertiser')->user()->id)->where('advertisement_id', $id)->delete();
            $notify[] = ['warning', 'Favourite Removed!!'];
            return redirect()->back()->withNotify($notify);
        } else {
            $like = new Favourite();
            $like->advertiser_id = Auth::guard('advertiser')->user()->id;
            $like->advertisement_id = $request->id;
            $like->qty = 1;
            $like->save();
            $notify[] = ['success', 'Added to Favourite!!'];
            return redirect()->back()->withNotify($notify);
        }
    }
    public function getEdit($id)
    {
        $item =  Advertisement::findOrFail($id);
        $sub_category = Category::where('parent_id', $item->category_id)->first();
        return view('frontend.pages.user.ad_form.form_update', compact('item', 'sub_category'));
    }

    public function getDelete($id)
    {
        Advertisement::find($id)->delete();
        $notify[] = ['success', 'Ad deleted successfully!!'];
        return redirect()->back()->withNotify($notify);
    }
}
