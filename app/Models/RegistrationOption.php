<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationOption extends BaseModel {

	protected $table = 'registration_options';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'label', 'details', 'cost', 'required', 'option_type_id', 'form_id');

	public function type()
	{
		return $this->belongsTo('App\Models\LuOptionType', 'option_type_id', 'option_type_id');
	}

	public function form()
	{
		return $this->belongsTo('App\Models\RegistrationForm');
	}

}