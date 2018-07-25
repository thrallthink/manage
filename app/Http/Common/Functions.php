<?php

namespace App\Http\Common;



class Functions 
{
    
    public function generateTeamCode()
    {
        $uniquecode = uniqid();
        return 'Team-'.$uniquecode;
    }

    public function generatePlayerCode()
    {
        $uniquecode = uniqid();
        return 'Player-'.$uniquecode;
    }
   
}
