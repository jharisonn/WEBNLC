<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
  protected $table = 'soal';
  protected $primaryKey = 'id_soal';
  public $incrementing = true;
  public $timestamps = false;

  public function history(){
    return $this->hasMany('App\Model\History','id_soal','id_soal');
  }
}
