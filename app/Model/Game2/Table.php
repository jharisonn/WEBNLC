<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
  protected $connection = 'game2';
  protected $table = 'table';
  protected $primaryKey = 'id_table';
  public $incrementing = true;
  public $timestamps = false;
}
