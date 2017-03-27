<?php

namespace App\Providers;

use App\Amicus\AttendHelper;
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
        Validator::extend('attendValues', function ($attribute, $value, $parameters, $validator) {

            foreach ($parameters as $parameter) {
                switch ($parameter) {
                    case 'available':
                        $conditions[$parameter] = AttendHelper::slotsAvailable($value);
                        break;
                    case 'active':
                        $conditions[$parameter] = AttendHelper::slotsActive($value);
                }
            }

            foreach ($conditions as $condition) {
                if ($condition === false) {
                    return false;
                }
            }
            return true;
        });

        Validator::replacer('attendValues', function ($message, $attribute, $rule, $parameters) {
            foreach ($parameters as $parameter) {
                switch ($parameter) {
                    case 'active':
                        return "Optiune dezactivata";
                    case 'available':
                        return "Optiune fara locuri disponibile";
                }
            }
            return $message;
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
