<?php
/**
 * Created by PhpStorm.
 * User: tikagnus
 * Date: 19.03.2017
 * Time: 20:36
 */

namespace App\Amicus;


use App\Models\Attending;
use App\Models\AttendOption;
use App\Models\Event;
use App\Models\LuOptionType;
use App\Models\OptionValue;
use App\Models\RegistrationForm;
use App\Models\RegistrationOption;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AttendHelper
{

    public static function attend(Event $event, RegistrationForm $form, $data, User $user = null)
    {
        $data = Helper::a2o($data);

        if (!isset($user->id)) {
            $user = Auth::user();
        }

        //todo check if options are already available !!

        //todo check if user already attended,

        $attend = static::attendUser($event, $form, $user);

        $totalCost = 0;
        $options = RegistrationOption::whereIn('id', array_keys($data->options))->get();


        foreach ($options as $option) {
            switch ($option->option_type_id) {
                case LuOptionType::TEXT:
                    $value = $data->options[$option->id];
                    if (!empty($value)) {
                        $attends[] = static::attendOption($attend, $option, $value);
                    }
                    break;

                case LuOptionType::ENUMERATION:

                    $valuesIds = $data->options[$option->id]['values'];
                    $values = OptionValue::whereIn('id', $valuesIds)->get();

                    foreach ($values as $value) {
                        $cost = null;
                        if ($option->cost) {
                            $cost = $value->cost_value;
                            $totalCost += $cost;
                        }

                        if ($option->slots) {
                            static::decreaseSlots($value);
                        }

                        $attends[] = static::attendOption($attend, $option, $value->value);
                    }
                    break;

                case LuOptionType::MULTIPLE:

                    $cost = null;
                    $valueId = $data->options[$option->id];
                    $value = OptionValue::find($valueId);
                    if ($option->cost) {
                        $cost = $value->cost_value;
                        $totalCost += $cost;
                    }

                    if ($option->slots) {
                        static::decreaseSlots($value);
                    }

                    $attends[] = static::attendOption($attend, $option, $value->value);

                    break;
            }
        }


        //todo update total cost !!

    }

    public static function attendUser(Event $event, RegistrationForm $form, User $user, $totalCost = null)
    {
        $attend = Attending::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'form_id' => $form->id,
            'totalCost' => $totalCost
        ]);

        return $attend;
    }

    public static function attendOption(Attending $attend, RegistrationOption $option, $value)
    {
        $attendOption = AttendOption::create([
            'attend_id' => $attend->id,
            'option_id' => $option->id,
            'value' => $value
        ]);

        return $attendOption;
    }


    public static function decreaseSlots(OptionValue $value)
    {
        $slots = $value->slots;
        $slots--;

        $value->slots = $slots;

        if($slots == 0){
            $value->active = false;
        }

        return $value->save();
    }
}