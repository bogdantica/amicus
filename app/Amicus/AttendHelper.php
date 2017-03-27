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

    public static function checkAttended($data, RegistrationForm $form, User $user)
    {
        return \DB::table('attendings')
            ->where('form_id', $form->id)
            ->where('user_id', $user->id)
            ->count();
    }

    public static function attend(Event $event, RegistrationForm $form, $data, User $user = null)
    {
        $data = Helper::a2o($data);

        if (!isset($user->id)) {
            $user = Auth::user();
        }

//        if(static::checkAttended($data,$form,$user)){
//            throw new \Exception("User already attended");
//        }


        //todo check if user already attended,

        $attend = static::attendUser($event, $form, $user);
        $data->options = collect([]);


        if (isset($data->multipleValues)) {
            $data->options = $data->options->merge($data->multipleValues);
        }

        foreach ($data->enumerationValues ?? [] as $values) {
            $data->options = $data->options->merge($values);
        }

        $textOptions = RegistrationOption::whereIn('id', array_keys($data->textOptions))
            ->get();

        foreach ($textOptions as $option) {
            $value = $data->textOptions[$option->id] ?? '';
            if (!empty($value)) {
                $attends[] = static::attendOption($attend, $option, $value);
            }
        }

        $values = OptionValue::whereIn('id', $data->options)
            ->with('option')
            ->get();

        $totalCost = 0;
        foreach ($values as $value) {

            switch ($value->option->option_type_id) {
                case LuOptionType::TEXT:

                    if (!empty($value)) {
//                        $attends[] = static::attendOption($attend, $option, $value);
                    }
                    break;

                case LuOptionType::ENUMERATION
                    ||
                    LuOptionType::MULTIPLE:

                    if (!is_null($value->cost_value)) {
                        $cost = $value->cost_value;
                        $totalCost += $cost;
                    }

                    if (!is_null($value->slots)) {
                        static::decreaseSlots($value);
                    }

                    $attends[] = static::attendValue($attend, $value);
                    break;

            }
        }

        if ($totalCost) {
            static::updateCost($attend, $totalCost);
        }

        //todo email de confirmare !!

        return true;

    }

    public static function updateCost(Attending $attending, $cost)
    {
        $attending->total_cost = $cost;

        return $attending->save();
    }

    public static function attendUser(Event $event, RegistrationForm $form, User $user, $totalCost = null)
    {
        $attend = Attending::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'form_id' => $form->id,
            'totalCost' => $totalCost,
            'confirmed' => false
        ]);

        return $attend;
    }

    public static function attendValue(Attending $attend, OptionValue $value, $rawValue = null)
    {
        $attendOption = AttendOption::create([
            'attend_id' => $attend->id,
            'option_id' => $value->option_id,
            'value' => $value->value ?? $rawValue,
            'value_id' => $value->id ?? null,
            'cost_value' => $value->cost_value ?? null
        ]);


        return $attendOption;
    }
    public static function attendOption(Attending $attend, RegistrationOption $option, $rawValue)
    {
        $attendOption = AttendOption::create([
            'attend_id' => $attend->id,
            'option_id' => $option->id,
            'value' => $rawValue,
            'value_id' => null,
            'cost_value' => null
        ]);


        return $attendOption;
    }

    public static function decreaseSlots(OptionValue $value)
    {
        $slots = $value->slots;
        $slots--;

        $value->slots = $slots;

        if ($slots == 0) {
            $value->active = false;
        }

        return $value->save();
    }

    public static function slotsAvailable($ids)
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        $values = \DB::table('option_values')
            ->whereIn('id', $ids)
            ->get();

        $available = true;
        foreach ($values as $value) {
            if (is_null($value->slots)) {
                continue;
            }
            if ($value->slots <= 0) {
                $available = false;
                break;
            }
        }

        return $available;
    }

    public static function slotsActive($ids)
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }

        $values = \DB::table('option_values')
            ->whereIn('id', $ids)
            ->get();

        $active = true;

        foreach ($values as $value) {
            if ($value->active == false) {
                $active = false;
                break;
            }
        }

        return $active;
    }


}