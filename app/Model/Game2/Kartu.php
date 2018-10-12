<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
  protected $connection = 'game2';
  protected $table = 'kartu';
  protected $primaryKey = 'id_kartu';
  public $incrementing = true;
  public $timestamps = false;
}
