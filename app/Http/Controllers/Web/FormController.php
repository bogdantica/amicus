<?php

namespace App\Http\Controllers\Web;


use App\Amicus\FormHelper;
use App\Amicus\Views\FormView;
use App\Http\Requests\FormRequest;
use App\Http\Requests\OptionRequest;
use App\Http\Requests\OptionValueRequest;
use App\Http\Requests\RegistrationFormRequest;
use App\Models\Event;
use App\Models\OptionValue;
use App\Models\RegistrationForm;
use App\Models\RegistrationOption;
use Illuminate\Http\Request;

class FormController extends BaseController
{
    public function save(RegistrationFormRequest $request, Event $event)
    {
        //todo change this
        $request->merge(['event_id' => $event->id]);

        FormHelper::createForm($request);

        return redirect()->back();
    }

    public function update(RegistrationFormRequest $request, RegistrationForm $form)
    {

        $data = FormHelper::updateForm($form,$request->all());

        return redirect()->back();
    }


    public function createOption(RegistrationForm $form, OptionRequest $request)
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

    public function createValue(RegistrationOption $option, OptionValueRequest $request)
    {

        $request->merge(['option_id' => $option->id]);

        $data = FormHelper::createOptionValue($request->all());

        return redirect()->back();
    }

    public function updateValue( OptionValue $value, OptionValueRequest $request)
    {
        $data = FormHelper::updateOptionValue($value,$request->all());

        return redirect()->back();
    }


}
