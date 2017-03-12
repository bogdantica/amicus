<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 13:58
 */

namespace App\Amicus\Views;


use App\Amicus\Helper;
use App\Models\Event;

class EventView
{
    public static function show(Event $event)
    {

        if($event->active == false){
            abort(404);
        }

        $event->load('type');
        $event->load('subsidiary');

        $event->location = Helper::locationParser($event->country,$event->county,$event->city);

        return (object)[
            'event' => $event
        ];
    }
}