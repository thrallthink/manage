<?php

namespace App\Http\Controllers\API;

use App\Player;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamPost;
use App\Http\Resources\TeamResource ;
use Route;

class PlayerApiController extends ApiController
{

   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id=0)
    {

       


        if(isset($id) && $id!=0)
        {
          
          return Player::find($id);
          
        }

        
        return PlayerResource::collection(Team::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamPost $request)
    {
        //
       // $this->validate($request, [
       //      'name' => 'required',
       //      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       //  ]);

        // $image = $request->file('image');

       $input['image_uri'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/player/'), $input['image_uri']);


        $input['name'] = $request->name;
        $input['code'] = $request->code;
        $input['about'] = $request->about;
        $input['team_id'] = $request->team_id;
        // dd($input);
        Player::create($input);


        return response()->json(['response' => 'success', 'message' => 'Player Successfully Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
       return view('team.show',compact('team'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        // dd($team);
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

       // dd($request);
    $player = Player::find($request->id);

    $player->name = $request->name;
    $player->code = $request->code;
    $player->about = $request->about;
    $player->team_id = $request->team_change_id;
    // dd($request);
    if(isset($request->image))
            {
                $image_uri = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/player/'), $image_uri);
        $player->image_uri = $image_uri;
        
            }

   $response = $player->save();

   

        return response()->json(['response' => 'success', 'message' => 'Player successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
       
       $team = Team::find($request->id);
       $team->delete();
        
        return redirect()->route('team.index')
                        ->with('success','Team deleted successfully');    }
}
