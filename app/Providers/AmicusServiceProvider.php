<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AmicusServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('attendSlots',function($attribute,$value,$parameters,$validator){

            $array = explode('.',$attribute);
            $valueId = reset($array);

            dump($attribute,$value,$parameters);

            dump('-----------------------');
//            todo check if value had remainig slots

            return true;
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
