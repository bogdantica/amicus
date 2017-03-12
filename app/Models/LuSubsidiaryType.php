<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuSubsidiaryType extends Model {

	protected $table = 'lookup_subsidiaries_types';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('subsidiary_type_id', 'name', 'details', 'display');

}