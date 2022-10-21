<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Advertiser;


class AdvertiserController extends Controller
{


    public function allAdvertiser(Request $request)
    {
        // dd($request->all());
        $query_param = [];
        $status = $request['status'];
        $search = $request['search'];
        $emptyMessage = "No Data Found";

        if ($request->has('search') && $request->search != null) {
            $key = explode(' ', $request['search']);
            $advertisers = Advertiser::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->where('email', 'like', "%{$value}%")
                        ->orwhere('first_name', 'like', "%{$value}%")
                        ->orwhere('last_name', 'like', "%{$value}%")
                        ->orwhere('mobile_no', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $advertisers = Advertiser::withCount(['ads', 'city'])->when($request->status != null, function ($q) {
                $q->where('status', request('status'));
            });
        }
        $advertisers = $advertisers->orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.advertisers.index', compact('advertisers', 'search', 'status', 'emptyMessage'));
    }

    public function profile($id)
    {
        $data['posted_ads'] = Advertisement::with('city', 'advertiser')->where('id', $id)->paginate(getPaginate());
        return view('admin.advertisers.profile', $data);
    }
}
