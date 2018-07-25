<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Team;
use App\Http\Requests\StoreTeamPost;
use App\Http\Requests\UpdateTeamPost;
use App\Http\Resources\TeamResource ;
use App\Http\Common\Functions;

class TeamController extends Controller
{
    // protected $commonfunction;

    // public __construct(Functions $functions)
    // {
    //     $this->commonfunction = $functions;
    // }

    public function users(){

       return TeamResource::collection(Team::all());

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = $this->call('GET','/api/team/', $request);
        // dd($teams);

// return $response;

        // $teams = Team::latest()->paginate(5);
        
        return view('team.index',compact('teams'))
            ->with('i', (request()->input('page', 1) - 1) * 25);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $functions = new Functions();
        $teamcode = $functions->generateTeamCode();
        
        return view('team.create',compact('teamcode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamPost $request)
    {
       
        $team = $this->call('POST','/api/team/store', $request);

        return redirect()->route('team.index')
            ->with('success',$team['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
       $team = $this->call('GET',"/api/team/$id", $request);


      $players = $team['players'];

      // dd($players);
       return view('team.show',compact('team','players'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $team = $this->call('GET',"/api/team/$id", $request);
      
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamPost $team, $id)
    {
        
        

        $this->call('POST','/api/team/update', $team);

        return redirect()->route('team.index')
                        ->with('success','Team updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

       $this->call('DELETE',"/api/team/$id", $request);
        
        return redirect()->route('team.index')
                        ->with('success','Team deleted successfully');    }
}
