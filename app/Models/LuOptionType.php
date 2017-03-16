<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuOptionType extends BaseModel {

	protected $table = 'lookup_option_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('option_type_id', 'name', 'display', 'details');

	const TEXT = 10;

	const ENUMERATION = 20;

	const MULTIPLE = 30;

}