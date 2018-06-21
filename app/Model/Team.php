<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $table = 'team';
  protected $primaryKey = 'id_team';
  protected $incrementing = true;

  public function history(){
    return $this->hasMany('App\Model\History','id_team','id_team');
  }
}
