<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
  protected $table = 'soal';
  protected $primaryKey = 'id_soal';
  protected $incrementing = true;
  protected $timestamps = false;

  public function history(){
    return $this->hasMany('App\Model\History','id_team','id_team');
  }
}
