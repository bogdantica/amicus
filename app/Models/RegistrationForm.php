<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationForm extends BaseModel {

	protected $table = 'registration_forms';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'active', 'event_id', 'details', 'cost_value');

	public function event()
	{
		return $this->belongsTo('App\Models\Event', 'event_id');
	}

	public function options()
	{
		return $this->hasMany('App\Models\RegistrationOption');
	}

}