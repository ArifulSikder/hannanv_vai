<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = Advertiser::where('facebook_id', $user->id)->first();
            if ($findUser) {
                Auth::guard('advertiser')->login($findUser, true);
                $notify[] = ['success', 'Login successful'];
                return redirect()->route('frontend.user.post.ad')->withNotify($notify);
            } else {
                $new_user = new Advertiser();
                $new_user->first_name = $user->name;
                $new_user->username = $user->email;
                $new_user->email = $user->email;
                $new_user->registration_code = rand(111111, 999999);
                $new_user->facebook_id = $user->id;
                $new_user->status = 1;
                $new_user->password = bcrypt('12345678');
                $new_user->save();
                $lastInsertedAdId = DB::getPdo()->lastInsertId();
                $checkUser = Advertiser::where('id', $lastInsertedAdId)->first();
                Auth::guard('advertiser')->login($checkUser, true);
                $notify[] = ['success', 'Login successful'];
                return redirect()->route('frontend.user.post.ad')->withNotify($notify);
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = Advertiser::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::guard('advertiser')->login($finduser, true);
                $notify[] = ['success', 'Login successful'];
                return redirect()->route('frontend.user.post.ad')->withNotify($notify);
            } else {

                $new_user = new Advertiser();
                $new_user->first_name = $user->name;
                $new_user->username = $user->email;
                $new_user->email = $user->email;
                $new_user->registration_code = rand(111111, 999999);
                $new_user->google_id = $user->id;
                $new_user->status = 1;
                $new_user->password = bcrypt('12345678');
                $new_user->save();
                $lastInsertedAdId = DB::getPdo()->lastInsertId();
                $checkUser = Advertiser::where('id', $lastInsertedAdId)->first();
                Auth::guard('advertiser')->login($checkUser, true);
                $notify[] = ['success', 'Login successful'];
                return redirect()->route('frontend.user.post.ad')->withNotify($notify);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
