<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends BaseModel {

	protected $table = 'events';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at','start_date','end_date'];
	protected $fillable = array('name', 'address', 'country', 'city', 'description', 'event_type_id', 'active', 'subsidiary_id');

	public function type()
	{
		return $this->belongsTo('App\Models\LuEventType', 'event_type_id', 'event_type_id');
	}

	public function subsidiary()
	{
		return $this->belongsTo('App\Models\Subsidiary', 'subsidiary_id');
	}

	public function form()
    {
        return $this->hasOne('App\Models\RegistrationForm','event_id','id');
    }

}