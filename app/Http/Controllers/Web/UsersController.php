<?php

namespace App\Http\Controllers\Web;


use App\Amicus\UserHelper;
use App\Amicus\Views\UserView;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends BaseController
{
    //

    public function profile(User $user = null)
    {
        $d = UserView::profile($user);

        return view('users.profile', compact('d'));

//        $data = \App\Amicus\Views\User::userProfile($user);
    }

    public function update(User $user, Request $request)
    {
        //todo validation user
        $data = UserHelper::updateUser($user,$request);

        return redirect()->back();
    }
}
