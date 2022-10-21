<?php

namespace App\Providers;

use App\Models\SupportTicket;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\Advertiser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $activeTemplate = activeTemplate();
        $general = GeneralSetting::first();
        $viewShare['general'] = $general ? $general : '';
        $viewShare['activeTemplate'] = $activeTemplate ? $activeTemplate : '';
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        view()->share($viewShare);
        view()->composer('admin.layout.left_sidebar', function ($view) {
            $view->with([
                'users_count'         => DB::table('advertisers')->count(),
                'active_users_count'         => DB::table('advertisers')->where('status', 1)->count()
            ]);
        });
    }
}
