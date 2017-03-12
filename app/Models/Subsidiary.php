<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsidiary extends BaseModel {

	protected $table = 'subsidiaries';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'address', 'country', 'county', 'city', 'active');

	public function type()
	{
		return $this->belongsTo('App\Models\LuSubsidiaryType', 'subsidiary_type_id', 'subsidiary_type_id');
	}

}