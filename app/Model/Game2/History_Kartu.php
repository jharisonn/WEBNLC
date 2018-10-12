<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class History_Kartu extends Model
{
  protected $connection = 'game2';
  protected $table = 'history_kartu';
  protected $primaryKey = 'id_history_kartu';
  public $incrementing = true;
  public $timestamps = false;
}
