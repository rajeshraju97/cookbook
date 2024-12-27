<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
    public function boot()
    {
        View::composer('*', function ($view) {

            if ($admin = Auth::guard('admin')->user()) {


                // Get the latest 5 notifications
                $latestNotifications = $admin->notifications()->latest()->take(5)->get();

                // Get the unread notification count
                $unreadCount = $admin->unreadNotifications->count();

                // Pass data to all views
                $view->with([
                    'latestNotificationCount' => $latestNotifications,
                    'unreadCount' => $unreadCount
                ]);
            }

        });




    }

}
