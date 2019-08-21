<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $guarded = array('id');

    public $timestamps = false;

    protected $fillable = [
      'customer_name', 'email', 'mobile_telno', 'company_name', 'department','rank', 'industory_id','image_url'
    ];


    //
    public function users(){
      return $this->hasMany('App\User');
    }

    public function projects(){
      return $this->hasMany('App\Project');
    }

    public function industory(){
      return $this->belongsTo('App\Industory');
    }

    public function processes(){
      return $this->hasMany('App\Process');
    }

}
