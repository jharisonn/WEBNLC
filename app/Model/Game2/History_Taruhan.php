<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class History_Taruhan extends Model
{
  protected $connection = 'game2';
  protected $table = 'history_taruhan';
  protected $primaryKey = 'id_taruhan';
  public $incrementing = true;
  public $timestamps = false;
}
