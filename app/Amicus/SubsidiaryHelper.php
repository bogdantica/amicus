<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 10:06
 */

namespace App\Amicus;


use App\Models\Subsidiary;

class SubsidiaryHelper
{

    public static function create($data)
    {
        $data = Helper::a2o($data);

        $subsidiary = Subsidiary::create([
            'name' => $data->name,
            'address' => $data->address,
            'country' => $data->country,
            'county' => $data->county,
            'city' => $data->city,
            'subsidiary_type_id' => $data->subsidiary_type_id
        ]);
        return $subsidiary;
    }

    public static function update(Subsidiary $subsidiary, $data)
    {
        $data = Helper::a2o($data);

        $subsidiary = $subsidiary->fill([
            'name' => $data->name,
            'address' => $data->address,
            'country' => $data->country,
            'county' => $data->county,
            'city' => $data->city,
            'subsidiary_type_id' => $data->subsidiary_type_id
        ]);

        if($subsidiary->save()){
            return $subsidiary;
        }

        return false;
    }

    public static function delete(Subsidiary $subsidiary)
    {
        return $subsidiary->delete();
    }

}