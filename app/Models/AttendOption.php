<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendOption extends BaseModel {

	protected $table = 'attend_options';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('attend_id', 'option_id', 'value');

	public function option()
	{
		return $this->belongsTo('App\Models\RegistrationOption');
	}

}