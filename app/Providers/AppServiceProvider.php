<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        //

        Validator::extend('phone_number', function ($attribute, $value, $parameters) {


            if (substr($value, 0, 1) == '7' && strlen($value) == 11) {
                return true;
            }
            if (substr($value, 0, 2) == "+7" && strlen($value) == 12) {
                return true;
            }
            if (substr($value, 0, 1) == '8' && strlen($value) == 11) {
                return true;
            }
            return false;
        }, 'Введите правильный номер телефона');
    }
}
