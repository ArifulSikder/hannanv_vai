<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getLogin(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            //Validation rules
            $rules = [
                'email' => 'required',
                'password' => 'required',
            ];
            //Validation message
            $customMessage = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessage);

            if (Auth::guard('advertiser')->attempt(['email' => $data['email'], 'status' => 1, 'password' => $data['password']])) {
                $notify[] = ['success', 'Login successful'];
                return redirect()->route('frontend.user.my_ads')->withNotify($notify);
            } else {
                $notify[] = ['error', 'Something error'];
                return redirect()->back()->withNotify($notify);
            }
        }
        return view('frontend.pages.user.login');
    }
    public function logout()
    {
        Auth::guard('advertiser')->logout();
        return redirect()->route('frontend.home');
    }
    public function deviceLogout()
    {
        Auth::logoutOtherDevices(request('password'));
        $notify[] = ['success', 'Logout from other device'];
        return redirect()->route('frontend.home')->withNotify($notify);
    }
}
