<?php

namespace App\Http\Controllers\Web;


use App\Amicus\FormHelper;
use App\Amicus\Views\FormView;
use App\Models\Event;
use App\Models\RegistrationForm;
use App\Models\RegistrationOption;
use Illuminate\Http\Request;

class FormController extends BaseController
{
    public function save(Request $request, Event $event)
    {
        //todo change this
        $request->merge(['event_id' => $event->id]);

        FormHelper::createForm($request);

        return redirect()->back();
    }


    public function createOption(RegistrationForm $form, Request $request)
    {
        dd($request->all());
    }

    public function createValue(RegistrationOption $option, Request $request)
    {
        dd($request->all());
    }

}
