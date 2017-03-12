<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 12:04
 */

namespace App\Amicus\Views;


use App\Amicus\Helper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserView
{
    public static function profile(User $user = null)
    {
        if(is_null($user) ||  !isset($user->id)){
            $user = Auth::user();
        }

        $user->load('subsidiary');



        $user->location = Helper::locationParser($user->country,$user->county,$user->city);

        return (object)[
            'user' => $user,
        ];
    }
}