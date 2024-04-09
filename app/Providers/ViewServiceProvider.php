<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layouts.nav',function ($view){
            $usersWithCartsCount =  User::whereHas('carts')->count();
            $view->with('usersWithCartsCount',$usersWithCartsCount);
        });
    }
}
