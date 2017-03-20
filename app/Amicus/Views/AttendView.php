<?php
/**
 * Created by PhpStorm.
 * User: tikagnus
 * Date: 19.03.2017
 * Time: 20:36
 */

namespace App\Amicus\Views;


use App\Models\Event;

class AttendView
{
    public static function show(Event $event)
    {
        $form = $event->form;

        if($form->active == false){
            abort(404);
        }

        $form->load('options');
        $form->load('options.type');
        $form->load('options.value');

        return (object)[
            'form' => $form
        ];

    }

}