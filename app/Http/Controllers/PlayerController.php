<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Team;
use App\Http\Requests\PlayerRequest;
use App\Http\Requests\UpdatePlayerPost;
use App\Http\Common\Functions;


class PlayerController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PlayerRequest $request)
    {
        $functions = new Functions();
        $playercode = $functions->generatePlayerCode();
        $teamid = $request->teamid;
        return view('player.create',compact('teamid','playercode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        $player = $this->call('POST','/api/player/store', $request);

        return redirect()->route('team.show',$request->team_id)
            ->with('success',$player['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $player = $this->call('GET',"/api/player/$id", $request);

      // dd($players);
       return view('player.show',compact('player')); 

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $teams = $this->call('GET','/api/team/', $request);

       $player = $this->call('GET',"/api/player/$id", $request);
        

        return view('player.edit',compact('player','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerPost $player, $id)
    {

     

          $response=   $this->call('POST','/api/player/update', $player);

        return redirect()->route('team.show',$player->team_id)
                        ->with('success',$response['message']);
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

     $response =   $this->call('DELETE',"/api/player/$id", $request);
        
        return redirect()->route('team.show',$request->team_id)
                        ->with('success',$response['message']);    }

}
