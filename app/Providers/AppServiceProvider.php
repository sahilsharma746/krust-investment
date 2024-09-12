<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAccountType;


use Illuminate\Support\ServiceProvider;

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
            $user_data = Auth::user(); // Get the authenticated user
            if ($user_data) {
                $plan_name = UserAccountType::select('name')->where('id', $user_data->account_type)->first();
                $view->with('user_plan', $plan_name->name);
                $view->with('user_data', $user_data);
            } else {
                $view->with('user_plan', 'User data not available'); // handle the case where user_data is null
            }
        });
    }
    
}
