<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
  protected $connection = 'game2';
  protected $table = 'history';
  protected $primaryKey = 'id_history';
  public $incrementing = true;
  public $timestamps = false;
}
