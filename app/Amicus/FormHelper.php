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

    public static function createFormOption($data)
    {
        $data = Helper::a2o($data);

        $option = RegistrationOption::create([
            'name' => $data->name,
            'label' => $data->label,
            'details' => $data->details ?? null,
            'cost' => is_null($data->cost) ? false : $data->cost,
            'slots' => is_null($data->slots) ? false : $data->slots,
            'form_id' => $data->form_id,
            'option_type_id' => $data->option_type_id
        ]);

        return $option;
    }

    public static function createOptionValue($data)
    {
        $data = Helper::a2o($data);

        $value = OptionValue::create([
            'option_id' => $data->option_id,
            'value' => $data->value,
            'cost_value' => is_null($data->cost_value) ? null : $data->cost_value,
            'slots' => is_null($data->slots) ? null : $data->slots,
        ]);

        return $value;
    }



}