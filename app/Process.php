<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'processes';

    protected $guarded = array('id');

    //updated_atを無効にする
    public $timestamps = false;

    protected $fillable = [
      'contact_date', 'purpose', 'progress_rate', 'user_id', 'customer_id','memo','done',
    ];

    public function customer(){
      return $this->belongsTo('App\Customer');
    }

    public function industory(){
      return $this->belongsTo('App\Industory');
    }

    public function product(){
      return $this->belongsTo('App\Product');
    }

}
