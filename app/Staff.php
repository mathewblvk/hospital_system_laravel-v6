<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name','email','staff_code','password','education','location','contactnumber','role_id'];


    public function role(){
       return $this->belongsTo('App\Role');
    }
}
