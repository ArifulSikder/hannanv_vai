<?php

use App\Models\CMSPage;
use App\Models\Message;
use App\Models\UserContact;
use App\Events\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\StripeController;
use App\Http\Controllers\Front\PaystackController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\FeatureAdController;
use App\Http\Controllers\Front\AdComplainController;
use App\Http\Controllers\Front\SocialAuthController;
use App\Http\Controllers\Front\AdvertisementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cc', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});



Route::get('admin', ['as' => 'getLogin', 'uses' => '\App\Http\Controllers\Admin\AdminAuthController@getLogin']);
Route::post('admin/login', ['as' => 'postLogin', 'uses' => '\App\Http\Controllers\Admin\AdminAuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\Admin\AdminAuthController@getLogout']);

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    //Role and Permission System Route
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => '\App\Http\Controllers\Admin\DashboardController@getIndex']);

    Route::get('admin-users', ['middleware' => 'acl:view_admin_user', 'as' => 'admin-user', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getIndex']);
    Route::get('admin-user/new', ['middleware' => 'acl:add_admin_user', 'as' => 'admin-user.new', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getCreate']);
    Route::post('admin-user/store', ['middleware' => 'acl:add_admin_user', 'as' => 'admin-user.store', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@postStore']);
    Route::get('admin-user/{id}/edit', ['middleware' => 'acl:edit_admin_user', 'as' => 'admin-user.edit', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getEdit']);
    Route::post('admin-user/{id}/update', ['middleware' => 'acl:edit_admin_user', 'as' => 'admin-user.update', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@putUpdate']);
    Route::get('admin-user/{id}/delete', ['middleware' => 'acl:delete_admin_user', 'as' => 'admin-user.delete', 'uses' => '\App\Http\Controllers\Admin\AdminUserController@getDelete']);
    // User-Group
    Route::get('user-group', ['middleware' => 'acl:view_user_group', 'as' => 'user-group', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getIndex']);
    Route::get('user-group/new', ['middleware' => 'acl:new_user_group', 'as' => 'user-group.new', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getCreate']);
    Route::post('user-group/store', ['middleware' => 'acl:new_user_group', 'as' => 'user-group.store', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@postStore']);
    Route::get('user-group/{id}/edit', ['middleware' => 'acl:edit_user_group', 'as' => 'user-group.edit', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getEdit']);
    Route::post('user-group/{id}/update', ['middleware' => 'acl:edit_user_group', 'as' => 'user-group.update', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@putUpdate']);
    Route::get('user-group/{id}/delete', ['middleware' => 'acl:delete_user_group', 'as' => 'user-group.delete', 'uses' => '\App\Http\Controllers\Admin\UserGroupController@getDelete']);
    // User-Group
    Route::get('assign-access', ['middleware' => 'acl:assign_user_access', 'as' => 'assign-access', 'uses' => '\App\Http\Controllers\Admin\AssignAccessController@getIndex']);

    // Role
    Route::get('role', ['middleware' => 'acl:view_role', 'as' => 'role', 'uses' => '\App\Http\Controllers\Admin\RoleController@getIndex']);
    Route::get('role/new', ['middleware' => 'acl:add_role', 'as' => 'role.new', 'uses' => '\App\Http\Controllers\Admin\RoleController@getCreate']);
    Route::post('role/store', ['middleware' => 'acl:add_role', 'as' => 'role.store', 'uses' => '\App\Http\Controllers\Admin\RoleController@postStore']);
    Route::get('role/{id?}/edit', ['middleware' => 'acl:edit_role', 'as' => 'role.edit', 'uses' => '\App\Http\Controllers\Admin\RoleController@getEdit']);
    Route::post('role/{id}/update', ['middleware' => 'acl:edit_role', 'as' => 'role.update', 'uses' => '\App\Http\Controllers\Admin\RoleController@postUpdate']);
    Route::get('role/{id}/delete', ['middleware' => 'acl:delete_role', 'as' => 'role.delete', 'uses' => '\App\Http\Controllers\Admin\RoleController@getDelete']);
    // Permission-Group
    Route::get('permission-group', ['middleware' => 'acl:view_menu', 'as' => 'permission-group', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getIndex']);
    Route::get('permission-group/new', ['middleware' => 'acl:new_menu', 'as' => 'permission-group.new', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getCreate']);
    Route::post('permission-group/store', ['middleware' => 'acl:new_menu', 'as' => 'permission-group.store', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@postStore']);
    Route::get('permission-group/{id}/edit', ['middleware' => 'acl:edit_menu', 'as' => 'permission-group.edit', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getEdit']);
    Route::post('permission-group/{id}/update', ['middleware' => 'acl:edit_menu', 'as' => 'permission-group.update', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@putUpdate']);
    Route::get('permission-group/{id}/delete', ['middleware' => 'acl:delete_menu', 'as' => 'permission-group.delete', 'uses' => '\App\Http\Controllers\Admin\PermissionGroupController@getDelete']);
    //Permission
    Route::get('permission', ['middleware' => 'acl:view_action', 'as' => 'permission.index', 'uses' => '\App\Http\Controllers\Admin\PermissionController@getIndex']);
    Route::get('permission/new', ['middleware' => 'acl:new_action', 'as' => 'permission.new', 'uses' => '\App\Http\Controllers\Admin\PermissionController@getCreate']);
    Route::post('permission/store', ['middleware' => 'acl:new_action', 'as' => 'permission.store', 'uses' => '\App\Http\Controllers\Admin\PermissionController@postStore']);
    Route::get('permission/{id}/edit', ['middleware' => 'acl:edit_action', 'as' => 'permission.edit', 'uses' => '\App\Http\Controllers\Admin\PermissionController@getEdit']);
    Route::post('permission/{id}/update', ['middleware' => 'acl:edit_action', 'as' => 'permission.update', 'uses' => '\App\Http\Controllers\Admin\PermissionController@putUpdate']);
    //Route::get('permission/{id}/delete', ['middleware' => 'acl:delete_action', 'as' => 'permission.delete', 'uses' => 'PermissionController@getDelete']);
    Route::get('permission/{id}/delete', '\App\Http\Controllers\Admin\PermissionController@getDelete')->name('permission.delete');

    require_once __DIR__ . '/admin/advertiser.php';
    require_once __DIR__ . '/admin/email.php';
    require_once __DIR__ . '/admin/settings.php';
    require_once __DIR__ . '/admin/gateways.php';
    require_once __DIR__ . '/admin/extra.php';
    require_once __DIR__ . '/admin/support-ticket.php';
    require_once __DIR__ . '/admin/language.php';
    require_once __DIR__ . '/admin/frontend.php';
    require_once __DIR__ . '/admin/category.php';
    require_once __DIR__ . '/admin/city.php';
    require_once __DIR__ . '/admin/cms.php';

    Route::get('posted/ads', '\App\Http\Controllers\Admin\AdvertisementController@getAllAds')->name('all.ads');
    Route::get('ads/report', '\App\Http\Controllers\Admin\AdvertisementController@getReports')->name('all.report');
});


Route::group(['namespace' => 'Front', 'as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('help', [HomeController::class, 'help'])->name('help');
    Route::match(['get', 'post'], 'verify', [HomeController::class, 'verify'])->name('verify');
    Route::match(['get', 'post'], 'contact', [HomeController::class, 'contact'])->name('contact');
    Route::match(['get', 'post'], 'rating', [HomeController::class, 'rating'])->name('rating');

    Route::get('login/facebook', [SocialAuthController::class, 'facebookRedirect'])->name('facebook.redirect');
    Route::get('login/facebook/callback', [SocialAuthController::class, 'loginWithFacebook'])->name('facebook.login.callback');

    Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('login/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('google.login.callback');


    Route::post('message', [HomeController::class, 'sendMessage'])->name('sendMessage');
    Route::post('user/contacts', [HomeController::class, 'detailsSendMessage'])->name('detailsSendMessage');
    Route::get('/message/{id}', [HomeController::class, 'getMessage'])->name('getMessage');
    route::post('/delete-conversation-ajax', [HomeController::class, 'deleteConversationAjax']);
    route::post('/delete-only-conversation-ajax', [HomeController::class, 'deleteOnlyConversationAjax']);
    route::post('/block-user-ajax', [HomeController::class, 'blockUser']);
    route::post('/mark-as-important-ajax', [HomeController::class, 'markAsImportant']);

    Route::post('send/message', function (Request $request) {
        event(new MessageEvent($request->first_name, $request->messeges));
        return ['success' => true];
    });

    Route::get('delete-chat/{user_id}', [HomeController::class, 'deleteConversation']);
    Route::get('delete-all-chat', [HomeController::class, 'deleteAllChat']);

    Route::post('user/button/message', function (Request $request) {
    });


    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('stripe', [StripeController::class, 'stripe'])->name('stripe.form');
        Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
        Route::get('paystack', [PaystackController::class, 'paystack'])->name('paystack.form');
        Route::get('verify/paystack/{reference}', [PaystackController::class, 'paystackVerify'])->name('paystack.verify');
    });

    Route::prefix('cron')->name('cron.')->group(function () {
        Route::get('fiat-rate', '\App\Http\Controllers\Front\CronController@fiatRate')->name('fiat.rate');
        Route::get('crypto-rate', '\App\Http\Controllers\Front\CronController@cryptoRate')->name('crypto.rate');
    });
    Route::match(['get', 'post'], 'register', [HomeController::class, 'registerUser'])->name('register');
    Route::match(['get', 'post'], 'login', [UserController::class, 'getLogin'])->name('login');

    Route::prefix('user')->name('user.')->group(function () {
        Route::middleware('advertiser')->group(function () {
            Route::get('my/ads', [AdvertisementController::class, 'dashboard'])->name('my_ads');
            Route::match(['get', 'post'], '/setting/{id}', [DashboardController::class, 'setting'])->name('setting');
            Route::match(['get', 'post'], '/profile-update/{id}', [DashboardController::class, 'profile'])->name('update.profile');
            Route::get('profile/{id}', [DashboardController::class, 'profileView'])->name('view.profile');
            Route::match(['get', 'post'], '/update/photo/{id?}', [DashboardController::class, 'profileUpdatePhoto'])->name('update.photo');
            // Route::get('update/photo', [DashboardController::class, 'profileUpdatePhoto'])->name('update.photo');
            Route::post('update/password', [DashboardController::class, 'updateCurrentPassword'])->name('update.password');
            Route::post('check-current-pwd', [DashboardController::class, 'check_current_pwd'])->name('check.password');
            Route::get('mobile-no/show/{id}/{show_mobile_no}', [DashboardController::class, 'chageMobileNoStatus'])->name('mobile.status');
            Route::get('post/ad', [AdvertisementController::class, 'postAd'])->name('post.ad');

            Route::delete('ad/delete/{id}', [AdvertisementController::class, 'getDelete'])->name('delete.ad');
            Route::get('ad/edit/{id}', [AdvertisementController::class, 'getEdit'])->name('edit.ad');
            Route::post('ad/update/{id}', [AdvertisementController::class, 'adUpdate'])->name('update.ad');

            Route::match(['get', 'post'], '/others/ad/{id?}', [AdvertisementController::class, 'manageGeneralAd'])->name('general.ad.manage');
            Route::match(['get', 'post'], '/remove/img/{id?}', [AdvertisementController::class, 'removeImage'])->name('remove.image');

            Route::post('store/ad', [AdvertisementController::class, 'adStore'])->name('adStore');
            Route::match(['get', 'post'], 'sell/faster', [FeatureAdController::class, 'sellFaster'])->name('sellFaster');
            Route::match(['get', 'post'], '/manage/ad/{category_id}/{sub_category_id}', [AdvertisementController::class, 'postAdForm'])->name('ad.form');
            // Route::get('manage/ad/{category_id}/{sub_category_id}', [AdvertisementController::class, 'postAdForm'])->name('ad.form');
            Route::get('ad/category', [AdvertisementController::class, 'adCategoryId'])->name('category.id');
            Route::get('favourite/{id}', [AdvertisementController::class, 'addToFavourite'])->name('favourite');
            Route::get('logout',  [UserController::class, 'logout'])->name('logout');
            Route::get('device/logout',  [UserController::class, 'deviceLogout'])->name('device.logout');
            Route::get('delete/{id}', [DashboardController::class, 'delete'])->name('delete');

            Route::get('chat', [DashboardController::class, 'chat'])->name('chat');
            Route::delete('chat/delete/all', [DashboardController::class, 'chatDeleteAll'])->name('all.chat.delete');
        });
    });


    Route::prefix('ads')->name('ads.')->group(function () {
        Route::get('category/{id}', [HomeController::class, 'categoryWiseAds'])->name('categorywise');
        Route::get('sub/category/{id}', [HomeController::class, 'childCategoryAds'])->name('subcategorywise');
        Route::get('details/{slug}/{id}', [HomeController::class, 'details'])->name('details');
        // Route::get('all', [HomeController::class, 'allAds'])->name('see.all');
        Route::get('search', [HomeController::class, 'search'])->name('search');
        Route::get('auto/search', [HomeController::class, 'autoSearch'])->name('auto.search');
        Route::post('load/more/ads', [HomeController::class, 'loadMore'])->name('load.more');
        Route::post('complain', [AdComplainController::class, 'postComplain'])->name('complain');
        Route::get('city/{id}', [HomeController::class, 'cityWiseAds'])->name('cityWise');
    });
    Route::get('all', [HomeController::class, 'allAds'])->name('sort');
    Route::post('page/vote', [HomeController::class, 'pageVote'])->name('vote');
    Route::get('/test', function () {
        $domain = DB::table('general_settings')->pluck('domain_name')->first();
        dd($domain);
        return view('welcome');
    });
    $cmsSlug = CMSPage::select('slug')->where('status', 1)->get()->pluck('slug')->toArray();
    foreach ($cmsSlug as $page_slug) {
        Route::get('/' . $page_slug, [HomeController::class, 'cms_page']);
    }
});
