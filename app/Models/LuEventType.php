<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuEventType extends BaseModel {

	protected $table = 'lookup_event_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('event_type_id', 'name', 'display', 'description');

}