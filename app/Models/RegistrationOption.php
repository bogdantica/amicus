<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationOption extends BaseModel
{

    protected $table = 'registration_options';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'label', 'active', 'details', 'cost', 'required', 'slots', 'option_type_id', 'form_id','order');

    public function type()
    {
        return $this->belongsTo('App\Models\LuOptionType', 'option_type_id', 'option_type_id');
    }

    public function values()
    {
        return $this->hasMany('App\Models\OptionValue','option_id');
    }

    public function form()
    {
        return $this->belongsTo('App\Models\RegistrationForm');
    }

}