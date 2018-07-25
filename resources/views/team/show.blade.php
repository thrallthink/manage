@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{$team['name']}} Details</h2>
            </div>
          
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $team['name'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                {{ $team['code'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $team['description'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                 <img src="{{URL::asset(config('constants.TEAM_IMAGE_PATH').$team['logo_uri'])}}">
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-lg-12 mb-25">
           
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('player.create',['teamid'=>$team['id']]) }}"> Add Player</a>
            </div>
        </div>
    </div>

    @include('player.index')

@endsection

