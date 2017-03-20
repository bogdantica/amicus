<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 21:56
 */

namespace App\Amicus;


use App\Models\OptionValue;
use App\Models\RegistrationForm;
use App\Models\RegistrationOption;

class FormHelper
{
    public static function createForm($data)
    {
        $data = Helper::a2o($data);

        $form = RegistrationForm::create([
            'name' => $data->name,
            'details' => $data->details ?? null,
            'event_id' => $data->event_id,
            'active' => is_null($data->active) ? false : $data->active,
        ]);

        return $form;
    }

    public static function updateForm(RegistrationForm $form, $data)
    {
        $data = Helper::a2o($data);

        $form->fill((array)$data);

        if($form->save()){
            return true;
        }
        return false;
    }

    public static function createFormOption($data)
    {
        $data = Helper::a2o($data);

        $option = RegistrationOption::create([
            'name' => $data->name ?? str_slug($data->label),
            'label' => $data->label,
            'details' => $data->details ?? null,
            'cost' => $data->cost ?? false,
            'slots' => $data->slots ?? false,
            'form_id' => $data->form_id,
            'order' => $data->order ?? 0,
            'option_type_id' => $data->option_type_id
        ]);

        return $option;
    }

    public static function updateFormOption(RegistrationOption $option,$data){
        $data = Helper::a2o($data);

        $option->fill((array)$data);

        if($option->update()){
            return true;
        }

        return false;
    }

    public static function createOptionValue($data)
    {
        $data = Helper::a2o($data);

        $value = OptionValue::create([
            'option_id' => $data->option_id,
            'value' => $data->value,
            'details' => $data->details ?? null,
            'cost_value' => $data->cost ?? null,
            'slots' => $data->slots ?? null,
        ]);

        return $value;
    }

    public static function updateOptionValue(OptionValue $value,$data){

        $data = Helper::a2o($data);

        $value->fill((array)$data);

        if($value->save()){
            return true;
        }

        return false;
    }


}