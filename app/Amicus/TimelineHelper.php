<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 15:34
 */

namespace App\Amicus;


use App\Models\Event;
use App\Models\TimelineEvent;
use App\Models\User;

class TimelineHelper
{

    public static function createdUser(User $user)
    {
        $d = (object)[
            'user' => $user
        ];

        $timeLine = TimelineEvent::create([
            'body' => view('timeline.users.created', compact('d'))->__toString(),
            'entity_name' => 'users',
            'entity_id' => $user->id
        ]);
    }

    public static function createdEvent(Event $event)
    {
        $d = (object)[
            'event' => $event
        ];

        $timeLine = TimelineEvent::create([
            'body' => view('timeline.events.created',compact('d'))->__toString(),
            'entity_name' => 'events',
            'entity_id' => $event->id
        ]);
    }

}