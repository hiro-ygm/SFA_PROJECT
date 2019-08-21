<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Industory extends Model
{
    //
    public function projects(){
      return $this->hasMany('App\Project');
    }

    public function customers(){
      return $this->hasMany('App\Customer');
    }

    public function prpcesses(){
      return $this->hasMany('App\Process');
    }
}
