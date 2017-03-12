<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimelineEvent extends Model {

	protected $table = 'timeline_events';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('name', 'title', 'url', 'icon', 'body', 'entity_id', 'entity_name');

}