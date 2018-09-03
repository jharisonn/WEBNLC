<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = 'group';
  protected $primaryKey = 'id_group';
  public $incrementing = true;
  public $timestamps = false;

  public function team(){
    return $this->hasMany('App\Model\Team','id_group','id_group');
  }

  public function user(){
    return $this->hasMany('App\Model\User','id_group','id_group');
  }
}
