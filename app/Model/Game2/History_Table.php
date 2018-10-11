<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class History_Table extends Model
{
  protected $connection = 'game2';
  protected $table = 'history_table';
  protected $primaryKey = 'id_history_table';
  public $incrementing = true;
  public $timestamps = false;
}
