<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 10:22
 */

namespace App\Amicus;


use App\Models\Event;

class EventHelper
{
    public static function create($data)
    {
        $data = Helper::a2o($data);

        $event = Event::create([
            'name' => $data->name,
            'start_date' => $data->start_date,
            'end_date' => $data->end_date ?? null,
            'address' => $data->address,
            'country' => $data->country ?? null,
            'county' => $data->county ?? null,
            'city' => $data->city ?? null,
            'description' => $data->description ?? null,
            'event_type_id' => $data->event_type_id,
            'subsidiary_id' => $data->subsidiary_id,
            'active' => is_null($data->active) ? true : $data->active
        ]);

        TimelineHelper::createdEvent($event);

        return $event;
    }

    public static function update(Event $event, $data){
        $data = Helper::a2o($data);

        $event->fill([
            'name' => $data->name,
            'start_date' => $data->start_date,
            'end_date' => $data->end_date ?? null,
            'address' => $data->address ?? null,
            'country' => $data->country ?? null,
            'county' => $data->county ?? null,
            'city' => $data->city ?? null,
            'description' => $data->description ?? null,
            'event_type_id' => $data->event_type_id,
            'subsidiary_id' => $data->subsidiary_id,
            'active' => is_null($data->active) ? true : $data->active
        ]);

        if($event->save()){
            return $event;
        }

        return false;
    }

    public static function delete(Event $event)
    {
        return $event->delete();
    }



}