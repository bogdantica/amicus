<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionValue extends BaseModel
{

    protected $table = 'option_values';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('option_id', 'value', 'cost_value', 'slots','details','active');

    public function option()
    {
        return $this->belongsTo('App\Models\RegistrationOption');
    }

}