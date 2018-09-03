<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $table = 'team';
  protected $primaryKey = 'id_team';
  public $incrementing = true;
  public $timestamps = false;

  public function history(){
    return $this->hasMany('App\Model\History','id_team','id_team');
  }

  public function group(){
    return $this->belongsTo('App\Model\Group','id_group','id_group');
  }
}
