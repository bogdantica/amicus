<?php

namespace App\Http\Controllers\Web;


use App\Amicus\FormHelper;
use App\Amicus\Views\FormView;
use App\Models\Event;
use App\Models\OptionValue;
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

    public function update(Request $request, RegistrationForm $form)
    {

        $data = FormHelper::updateForm($form,$request->all());

        return redirect()->back();
    }


    public function createOption(RegistrationForm $form, Request $request)
    {

        //todo change this
        $request->merge(['form_id' => $form->id]);
        $data = FormHelper::createFormOption($request->all());

        return redirect()->back();
    }

    public function updateOption(RegistrationOption $option, Request $request)
    {

        $data = FormHelper::updateFormOption($option,$request->all());

        return redirect()->back();
    }

    public function createValue(RegistrationOption $option, Request $request)
    {

        $request->merge(['option_id' => $option->id]);

        $data = FormHelper::createOptionValue($request->all());

        return redirect()->back();
    }

    public function updateValue( OptionValue $value, Request $request)
    {
        $data = FormHelper::updateOptionValue($value,$request->all());

        return redirect()->back();
    }


}
