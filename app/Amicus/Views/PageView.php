<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 16:01
 */

namespace App\Amicus\Views;


use App\Models\TimelineEvent;

class PageView
{
    public static function home()
    {
        $timeLine = TimelineEvent::orderBy('created_at','DESC')
            ->get();

        return (object)[
            'tl' => $timeLine
        ];

    }
}