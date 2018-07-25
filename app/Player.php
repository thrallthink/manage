<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Player extends Model
{
    
    protected $table = 'player';

    protected $fillable = [
        'name', 'about','code','image_uri','team_id'
    ];

    public function team()
    {
        return $this->hasOne('App\Team');
    }
}
