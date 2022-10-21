<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'advertiser', 'as' => 'advertiser.'], function () {
    Route::get('index', ['middleware' => 'acl:all_advertiser', 'as' => 'all', 'uses' => '\App\Http\Controllers\Admin\AdvertiserController@allAdvertiser']);
    Route::get('profile/{id}', ['middleware' => 'acl:advertiser_profile', 'as' => 'profile', 'uses' => '\App\Http\Controllers\Admin\AdvertiserController@profile']);
});
