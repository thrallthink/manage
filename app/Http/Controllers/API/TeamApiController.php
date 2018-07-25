<?php

namespace App\Http\Controllers\API;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamPost;
use App\Http\Resources\TeamResource ;
use Route;

class TeamApiController extends ApiController
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
          
          return Team::with('players')->find($id);
           
          
        }

        
        return TeamResource::collection(Team::orderBy('id','desc')->get());
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

        $input['logo_uri'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/team/'), $input['logo_uri']);


        $input['name'] = $request->name;
        $input['code'] = $request->code;
        $input['description'] = $request->description;
        // dd($input);
        Team::create($input);


        return response()->json(['response' => 'success', 'message' => 'Team Successfully Added']);
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

    $team = Team::find($request->id);

    $team->name = $request->name;
    $team->code = $request->code;
    $team->description = $request->description;

    if(isset($request->image))
            {
                $logo_uri = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/team/'), $logo_uri);
        $team->logo_uri = $logo_uri;
        
            }

    $team->save();

        return response()->json(['response' => 'success', 'message' => 'Team successfully updated']);

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
                        ->with('success','Team deleted successfully');   
    }





}
