<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdComplain;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function getAllAds(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        $emptyMessage = "No Data Found";
        $advertiser_id = $request['advertiser_id'];
        $city_id = $request['city_id'];

        if ($request->has('search') && $request->search != null) {
            $key = explode(' ', $request['search']);

            $ads = Advertisement::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('title', 'like', "%{$value}%")
                        ->orwhere('color', 'like', "%{$value}%")
                        ->orwhere('brand', 'like', "%{$value}%")
                        ->orwhere('price', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $ads =  Advertisement::with(['advertiser', 'city'])
                ->when($request->city_id != null, function ($q) {
                    $q->where('city_id', request('city_id'));
                })->when($request->category_id != null, function ($q) {
                    $q->where('category_id', request('category_id'));
                })->when($request->advertiser_id != null, function ($q) {
                    $q->where('advertiser_id', request('advertiser_id'));
                });
        }
        $ads = $ads->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.ads.index', compact('ads', 'search', 'advertiser_id', 'city_id', 'emptyMessage'));
    }
    public function getReports(Request $request)
    {
        $ad_reports =  AdComplain::with(['ad'])->paginate(getPaginate());
        return view('admin.ads.reports', compact('ad_reports'));
    }
}
