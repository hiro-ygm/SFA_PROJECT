<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;


class Product extends Model
{

    public function projects(){
      return $this->hasMany('App\Project');
    }

    public function processes(){
      return $this->hasMany('App\Process');
    }
}
