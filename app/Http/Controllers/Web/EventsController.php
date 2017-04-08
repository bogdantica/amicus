<?php

namespace App\Http\Controllers\Web;

use App\Amicus\Views\EventView;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends BaseController
{
    public function show(Event $event)
    {
        $d = EventView::show($event);

        return view('events.show.show',compact('d'));
    }

    public function modalEvent(Request $request)
    {
        $this->validate($request,[
            'id' => 'nullable|exists:events,id'
        ]);

        if($request->id){
            $event = Event::find($request->id);
        }else{
            $event = new Event();
        }

        return [
            'modal' => view('events.modals.event.modal',compact('event'))->__toString()
        ];
    }

    public function update(Event $event, Request $request)
    {

    }

    public function save(Request $request)
    {

    }
}
