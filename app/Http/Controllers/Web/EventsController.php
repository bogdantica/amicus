<?php

namespace App\Http\Controllers\Web;

use App\Amicus\Views\EventView;
use App\Models\Event;

class EventsController extends BaseController
{
    public function show(Event $event)
    {
        $d = EventView::show($event);

        return view('events.show',compact('d'));
    }
}
