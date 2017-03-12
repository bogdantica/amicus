<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 10:07
 */

namespace App\Amicus;


/**
 * Class Helper
 * @package App\Amicus
 */
class Helper
{
    /**
     *
     * Check if $data is array and transform to object
     *
     * @param $data
     * @return object
     */
    public static function a2o($data)
    {
        if(is_array($data)){
            return (object)$data;
        }

        return $data;
    }

    public static function locationParser($country,$county,$city)
    {
        $location = [];

        if(!empty($country)){
            $location[] = $country;
        }

        if(!empty($county)){
            $location[] = $county;
        }

        if(!empty($city)){
            $location[] = $city;
        }



        $location = collect($location);
        return $location->implode(', ',$location);

    }
}