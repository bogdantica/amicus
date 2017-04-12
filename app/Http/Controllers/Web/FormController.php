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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FormController extends BaseController
{

    public function modalForm(Event $event,Request $request)
    {
        $this->validate($request,[
            'id' => 'nullable|exists:registration_forms,id',
        ]);

        if($request->id){
            $form = RegistrationForm::find($request->id);
        }else{
            $form = new RegistrationForm();
        }

        return [
            'modal' => view('events.modals.registration_form.form.modal',compact('form','event'))->__toString()
        ];
    }

    public function save(RegistrationFormRequest $request, Event $event)
    {
        $request->merge(['event_id' => $event->id]);

        FormHelper::createForm($request);

        return redirect()->back();
    }

    public function update(RegistrationFormRequest $request, RegistrationForm $form)
    {
        $data = FormHelper::updateForm($form,$request->all());
        return redirect()->back();
    }

    public function modalOptions(Event $event,RegistrationForm $form,Request $request)
    {
        $edit = true;
        return [
            'modal' => view('events.modals.registration_form.option.modal',compact('event','form','edit'))->__toString()
        ];
    }


    public function createOption(RegistrationForm $form, OptionRequest $request)
    {
        //todo change this
        $request->merge(['form_id' => $form->id]);
        $data = FormHelper::createFormOption($request->all());

        if($request->ajax()){
            return new JsonResponse([
                'success' => 'Optiune Creata'
            ]);
        }

        return redirect()->back();
    }


    public function updateOption(RegistrationOption $option, OptionRequest $request)
    {
        $data = FormHelper::updateFormOption($option,$request->all());

        if($request->ajax()){
            return new JsonResponse([
                'success' => 'Optiune Modificata'
            ]);
        }

        return redirect()->back();
    }

    public function modalOption(Request $request)
    {
        $this->validate($request,[
            'id' => 'nullable|exists:registration_options,id',
            'id2' => 'nullable|exists:registration_forms,id'
        ]);

        if($request->id){
            $option = RegistrationOption::find($request->id);
            $form = $option->form;
        }else{
            $option = new RegistrationOption();
            $form = RegistrationForm::find($request->id2);
        }

        return [
            'modal' => view('events.modals.registration_form.option.option',compact('option','form'))->__toString()
        ];
    }

    public function createValue(RegistrationOption $option, OptionValueRequest $request)
    {

        $request->merge(['option_id' => $option->id]);

        $data = FormHelper::createOptionValue($request->all());

        if($request->ajax()){
            return new JsonResponse([
                'success' => 'Valoare Creata'
            ]);
        }

        return redirect()->back();
    }

    public function updateValue( OptionValue $value, OptionValueRequest $request)
    {
        $data = FormHelper::updateOptionValue($value,$request->all());

        if($request->ajax()){
            return new JsonResponse([
                'success' => 'Valoare Modificata'
            ]);
        }
        return redirect()->back();
    }

    public function modalOptionValue(Request $request)
    {
        $this->validate($request,[
            'id' => 'nullable|exists:option_values,id',
            'id2' => 'nullable|exists:registration_options,id'
        ]);

        if($request->id){
            $value = OptionValue::with('option')
            ->find($request->id);
        }else{
            $value = new OptionValue();
            //todo option value !! to continue
        }

        return [
            'modal' => view('events.modals.registration_form.optionValue.value',compact('value'))->__toString()
        ];
    }


}
