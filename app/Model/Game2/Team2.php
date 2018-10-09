<?php

namespace App\Model\Game2;

use Illuminate\Database\Eloquent\Model;

class Team2 extends Model
{
    protected $connection = 'game2';
    protected $table = 'team';
    protected $primaryKey = 'id_team';
    public $incrementing = true;
    public $timestamps = false;

}
