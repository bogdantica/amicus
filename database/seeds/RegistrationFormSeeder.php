<?php

use Illuminate\Database\Seeder;

class RegistrationFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $form = \App\Amicus\FormHelper::createForm([
            'name' => 'Inscriere Eveniment',
            'active' => true,
            'event_id' => 1,
            'cost' => true
        ]);

        //host option
        $hostOption = \App\Models\RegistrationOption::create([
            'name' => 'host-option',
            'label' => 'Host',
            'details' => 'Host Details...',
            'cost' => true,
            'slots' => true,
            'option_type_id' => \App\Models\LuOptionType::ENUMERATION,
            'form_id' => $form->id
        ]);

        $hostHotel = \App\Models\OptionValue::create([
            'option_id' => $hostOption->id,
            'details' => 'Hotel details',
            'value' => 'Hotel Host ***',
            'cost_value' => 120.10,
            'slots' => 15,
        ]);

        $hostMotel = \App\Models\OptionValue::create([
            'option_id' => $hostOption->id,
            'details' => 'Hotel details',
            'value' => 'Motel Host *',
            'cost_value' => 60,
            'slots' => 30,
        ]);

        $hostApartament = \App\Models\OptionValue::create([
            'option_id' => $hostOption->id,
            'details' => 'Hotel details',
            'value' => 'Apartament Shared',
            'cost_value' => 30,
            'slots' => 50,
        ]);

        //meal option

        //host option
        $mealOption = \App\Models\RegistrationOption::create([
            'name' => 'meal-option',
            'label' => 'All',
            'details' => 'Meal Details...',
            'cost' => true,
            'slots' => true,
            'option_type_id' => \App\Models\LuOptionType::MULTIPLE,
            'form_id' => $form->id
        ]);

        $mealMonday = \App\Models\OptionValue::create([
            'option_id' => $mealOption->id,
            'details' => 'Meal Details...',
            'value' => 'Mean Monday',
            'cost_value' => 20,
            'slots' => 15,
        ]);

        $mealTuesday = \App\Models\OptionValue::create([
            'option_id' => $mealOption->id,
            'details' => 'Meal Details...',
            'value' => 'Meal Tuesday',
            'cost_value' => 20,
            'slots' => 30,
        ]);

        $mealWednesday = \App\Models\OptionValue::create([
            'option_id' => $mealOption->id,
            'details' => 'Meal Details...',
            'value' => 'Meal Wednesday',
            'cost_value' => 30,
            'slots' => 50,
        ]);

        $commentOption = \App\Models\RegistrationOption::create([
            'name' => 'comment',
            'label' => 'Leave a comment',
            'details' => 'With whom you want to stay in a room, or anything else...',
            'cost' => false,
            'slots' => false,
            'option_type_id' => \App\Models\LuOptionType::TEXT,
            'form_id' => $form->id
        ]);



    }
}
