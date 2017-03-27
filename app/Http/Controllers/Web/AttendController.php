<?php

namespace App\Http\Controllers\Web;

use App\Amicus\AttendHelper;
use App\Amicus\Views\AttendView;
use App\Http\Requests\AttendRequest;
use App\Models\Event;
use App\Models\RegistrationForm;
use Illuminate\Http\Request;

class AttendController extends BaseController
{
    //

    public function show(Event $event)
    {
        $d = AttendView::show($event);

        return view('events.show.tabs.attend', compact($d));
    }

    public function attend(Event $event, RegistrationForm $form, AttendRequest $request)
    {
//        dd($request->all());
        //todo request.
        //todo custom validation !!

        $d = AttendHelper::attend($event, $form, $request->all());
        return redirect()->back();
    }

    public function attendingList(RegistrationForm $form)
    {

    }

}
