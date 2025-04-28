<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;     // <- ini View dari Illuminate\Support
use Illuminate\Support\Facades\Session;  // <- ini Session dari Illuminate\Support
use App\Models\Admin;                    // <- ini Admin dari folder Models

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Session::has('admin_id')) {
                $admin = Admin::find(Session::get('admin_id'));
                $view->with('adminName', $admin ? $admin->name : 'Admin');
            } else {
                $view->with('adminName', 'Admin');
            }
        });
    }
}
