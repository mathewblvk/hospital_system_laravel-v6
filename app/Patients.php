<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patients extends Model
{

    protected $primaryKey = 'id';
    public$incrementing = false;
    use softdeletes;



}
