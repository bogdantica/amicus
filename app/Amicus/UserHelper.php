<?php

namespace App\Amicus;

/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 09:58
 */

use App\Models\TimelineEvent;
use App\Models\User;

class UserHelper
{

    public static function createUser($data)
    {
        $data = Helper::a2o($data);

        $user = User::create([
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'first_name' => $data->first_name,
            'last_name' => $data->last_name ?? null,
            'birthday' => $data->birthday ?? null,
            'phone' => $data->phone ?? null,
            'country' => $data->country ?? null,
            'county' => $data->county ?? null,
            'city' => $data->city ?? null,
            'skills' => $data->skills ?? null,
            'subsidiary_id' => $data->subsidiary_id ?? null,
            'sex' => $data->sex ?? null,
            'active' => is_null($data->active) ? true : $data->active
        ]);

        //create a timeline item

        TimelineHelper::createdUser($user);

        return $user;
    }

    public static function updateUser(User $user, $data)
    {
        $data = Helper::a2o($data);

        $user->fill([
            'email' => $data->email,
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'birthday' => $data->birthday,
            'phone' => $data->phone,
            'country' => $data->country,
            'county' => $data->county,
            'city' => $data->city,
            'skills' => $data->skills,
            'subsidiary_id' => $data->subsidiary_id,
            'sex' => $data->sex,
            'active' => is_null($data->active) ? true : $data->active
        ]);

        if ($user->save()) {

            if(isset($data->password)){
                $user->password = bcrypt($data->password);

                if($user->save()){
                    return true;
                }
            }
        }

        return false;
    }

    public static function deleleUser(User $user)
    {
        return $user->delete();
    }


}