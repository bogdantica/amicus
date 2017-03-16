<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 23:08
 */

namespace App\Amicus\Views;


use App\Models\Event;

class FormView
{
    public static function create(Event $event)
    {
        return (object)[
            'event' => $event

        ];
    }
}