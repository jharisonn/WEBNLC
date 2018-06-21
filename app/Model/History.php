<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $table = 'history';
  protected $primaryKey = 'id_history';
  protected $incrementing = true;

  public function team(){
    return $this->belongsTo('App\Model\Team','id_team','id_team');
  }

  public function soal(){
    return $this->belongsTo('App\Model\Soal','id_soal','id_soal');
  }
}
