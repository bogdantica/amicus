<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceEntity extends BaseModel {

	protected $table = 'resource_entities';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('resource_id', 'entity', 'entity_id');

	public function resource()
	{
		return $this->belongsTo('App\Models\Resource', 'resource_id');
	}

}