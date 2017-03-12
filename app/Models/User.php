<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes, EntrustUserTrait {

        SoftDeletes::restore as sfRestore;
        EntrustUserTrait::restore as euRestore;

    }

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'birthday',
        'phone',
        'country',
        'county',
        'city',
        'skills',
        'subsidiary_id',
        'sex',
        'active'
    ];

    public function subsidiary()
    {
        return $this->belongsTo('App\Models\Subsidiary', 'subsidiary_id');
    }

    public function restore(){
        $this->sfRestore();

        Cache::tags(Config::get('entrust.role_user_table'))->flush();
    }
}
