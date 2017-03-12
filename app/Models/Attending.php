<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attending extends BaseModel {

	protected $table = 'attendings';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('user_id', 'form_id', 'event_id', 'total_cost');

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function form()
	{
		return $this->belongsTo('App\Models\RegistrationForm');
	}

	public function event()
	{
		return $this->belongsTo('App\Models\Event');
	}

	public function options()
	{
		return $this->hasMany('App\Models\AttendOption');
	}

}